<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\available;
use App\Models\Booking;
use App\Models\Cities;
use App\Models\Routes;
use App\Repositories\BookingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BookingController extends AppBaseController
{
    /** @var  BookingRepository */
    private $bookingRepository;

    public function __construct(BookingRepository $bookingRepo)
    {
        $this->bookingRepository = $bookingRepo;
    }

    /**
     * Display a listing of the Booking.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bookingRepository->pushCriteria(new RequestCriteria($request));
        $bookings = $this->bookingRepository->all();

        return view('bookings.index')
            ->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new Booking.
     *
     * @return Response
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created Booking in storage.
     *
     * @param CreateBookingRequest $request
     *
     * @return Response
     */
    public function store(CreateBookingRequest $request)
    {
        $input = $request->all();

        $booking = $this->bookingRepository->create($input);

        Flash::success('Booking saved successfully.');

        return redirect(route('bookings.index'));
    }

    /**
     * Display the specified Booking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified Booking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.edit')->with('booking', $booking);
    }

    /**
     * Update the specified Booking in storage.
     *
     * @param  int              $id
     * @param UpdateBookingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookingRequest $request)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $booking = $this->bookingRepository->update($request->all(), $id);

        Flash::success('Booking updated successfully.');

        return redirect(route('bookings.index'));
    }

    /**
     * Remove the specified Booking from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $booking = $this->bookingRepository->findWithoutFail($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $this->bookingRepository->delete($id);

        Flash::success('Booking deleted successfully.');

        return redirect(route('bookings.index'));
    }
    public function AJAXinfo(Request $request){
//       $booking = Booking::find((int)$request->trip_route_id);
       $seats = available::find((int)$request->trip_route_id);

       $TotalSeats = '<h4 class="text-primary text-center">Click on Seat to select / deselect</h4><div class="row" style="padding-right: 15px;">';
       $busySeats = explode(',', $seats->busy);

       for ($i = 0; $i < $seats->seats; $i ++){
           $busy = false;
           for ($j = 0; $j < count($busySeats); $j ++){
                if($i+1 == $busySeats[$j]) {
                    $TotalSeats .= '<div class="col-xs-2"><div class=\'seat ladies\' data-item=""><div class="seat-body">' . ($i+1) . '<span class="seat-handle-left"></span><span class="seat-handle-right"></span><span class="seat-bottom"></span></div></div></div>';
                   $busy = true;
                }
           }
           if(!$busy){
               $TotalSeats .= '<div class="col-xs-2"><div class="seat occupied ChooseSeat" data-item=""><div class="seat-body">'. ($i+1) .'<span class="seat-handle-left"></span> <span class="seat-handle-right"></span><span class="seat-bottom"></span></div></div></div>';
           }
       }

        $data['seats'] =  $TotalSeats;
        $data['pickup'] =  '<option selected value="'. $request->from .'">'. $request->from .'</option>';
        $data['drop'] =  '<option selected value="'. $request->to .'">'. $request->to .'</option>';
        $data['trip_id_no'] = $request->fleet_registration_id;
        $data['trip_route_id'] = $request->fleet_registration_id;
        $data['fleet_registration_id'] = $request->fleet_registration_id;
        $data['fleet_type_id'] = $request->fleet_registration_id;
        $data['booking_date'] = $request->booking_date;

      return json_encode($data);
    }
    public function AJAXBoockingInfo(Request $request){
        $rout = Routes::find((int)$request->trip_route_id);

        $data['price'] =  $rout->fare;
        $data['total'] = 0;
        $data['status'] = true;

        return json_encode($data);
    }

    public function registBooking(Request $request){
        $user = Auth::user();

        $price = Routes::find($request->trip_route_id)->first(['fare']);
        $seats = array_filter(explode(',',$request->seat_number));

        $avaibles = available::where('route_id',$request->trip_route_id)->first();
        $avaibles->busy = rtrim(implode(',',array_unique(array_merge($seats,explode(',', $avaibles->busy)), SORT_REGULAR)),',');
        $avaibles->save();

        $booking = new Booking();
        $booking->user_id = $user->id;
        $booking->route_ids = $request->trip_route_id;
        $booking->route_name = $price->name;
        $booking->seats = rtrim($request->seat_number,',');
        $booking->fare = $price->fare * count($seats);
        $booking->created_at = date("Y-m-d H:i:s");
        $booking->updated_at = date("Y-m-d H:i:s");
        $booking->save();

        return redirect(route('bookings.user.dashboard'));
    }

    public function userBookings(){
        $cities = json_encode(Cities::all(['id','name']));

        $bookings = Booking::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();

        return view('users.dashboard',compact('cities','bookings'));
    }
}
