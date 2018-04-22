<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoutesRequest;
use App\Http\Requests\UpdateRoutesRequest;
use App\Models\available;
use App\Models\Routes;
use App\Repositories\RoutesRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Cities;
use App\Models\Autobuses;
use App\Models\Booking;

class RoutesController extends AppBaseController
{
    /** @var  RoutesRepository */
    private $routesRepository;

    public function __construct(RoutesRepository $routesRepo)
    {
        $this->routesRepository = $routesRepo;
        $this->middleware('auth:admin')->except('search');
    }

    /**
     * Display a listing of the Routes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->routesRepository->pushCriteria(new RequestCriteria($request));
        $routes = $this->routesRepository->all();

        return view('routes.index')
            ->with('routes', $routes);
    }

    /**
     * Show the form for creating a new Routes.
     *
     * @return Response
     */
    public function create()
    {
        $cities = json_encode(Cities::all(['id','name']));
        $buses = Autobuses::orderBy('id')->pluck('plateNumber','id');
        return view('routes.create',compact('cities','buses'));
    }

    /**
     * Store a newly created Routes in storage.
     *
     * @param CreateRoutesRequest $request
     *
     * @return Response
     */
    public function store(CreateRoutesRequest $request)
    {
        $input = $request->all();
        $routes = $this->routesRepository->create($input);

        $bus = Autobuses::find($routes->busID)->first();
        $avaible = new available();
        $avaible->route_name = $routes->name;
        $avaible->route_id = $routes->id;
        $avaible->bus_id = $routes->busID;
        $avaible->bus_plate_number = $bus->plateNumber;
        $avaible->seats = $bus->seats;
        $avaible->busy = '';
        $avaible->created_at = date("Y-m-d H:i:s");
        $avaible->updated_at = date("Y-m-d H:i:s");
        $avaible->save();

        Flash::success('Routes saved successfully.');

        return redirect(route('routes.index'));
    }

    /**
     * Display the specified Routes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $routes = $this->routesRepository->findWithoutFail($id);

        if (empty($routes)) {
            Flash::error('Routes not found');

            return redirect(route('routes.index'));
        }

        return view('routes.show')->with('routes', $routes);
    }

    /**
     * Show the form for editing the specified Routes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $routes = $this->routesRepository->findWithoutFail($id);
        $cities = json_encode(Cities::all(['id','name']));
        $buses = Autobuses::orderBy('id')->pluck('plateNumber','id');
        if (empty($routes)) {
            Flash::error('Routes not found');

            return redirect(route('routes.index'));
        }

        return view('routes.edit',compact('cities','buses'))->with('routes', $routes);
    }

    /**
     * Update the specified Routes in storage.
     *
     * @param  int              $id
     * @param UpdateRoutesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoutesRequest $request)
    {
        $routes = $this->routesRepository->findWithoutFail($id);

        if (empty($routes)) {
            Flash::error('Routes not found');

            return redirect(route('routes.index'));
        }

        $routes = $this->routesRepository->update($request->all(), $id);

        Flash::success('Routes updated successfully.');

        return redirect(route('routes.index'));
    }

    /**
     * Remove the specified Routes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $routes = $this->routesRepository->findWithoutFail($id);

        if (empty($routes)) {
            Flash::error('Routes not found');

            return redirect(route('routes.index'));
        }

        $this->routesRepository->delete($id);

        Flash::success('Routes deleted successfully.');

        return redirect(route('routes.index'));
    }

    public function search(Request $request){

        $search = $request;
        $c = Cities::all(['id','name']);
        $city = $c->keyBy('id');
        $cities = json_encode($c);

        $routes = Routes::where('startTime', '>=',Carbon::today()->toDateString())
        ->where('endTime','<=', date_format(date_create($request->date . '23:59:59'), 'Y-m-d H:i:s'))
            ->where('from', $request->start_point)
            ->where('to',$request->end_point)
            ->orderBy('startTime')
            ->get();
        $seats = available::whereIn('route_id' , $routes->pluck('id')->all())->get()->keyBy('route_id');

        return view('search', compact('routes','cities','seats','city','search'));
    }
}
