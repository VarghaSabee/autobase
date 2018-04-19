<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDriversRequest;
use App\Http\Requests\UpdateDriversRequest;
use App\Repositories\DriversRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Autobuses;

class DriversController extends AppBaseController
{
    /** @var  DriversRepository */
    private $driversRepository;

    public function __construct(DriversRepository $driversRepo)
    {
        $this->driversRepository = $driversRepo;
    }

    /**
     * Display a listing of the Drivers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->driversRepository->pushCriteria(new RequestCriteria($request));
        $drivers = $this->driversRepository->all();

        return view('drivers.index')
            ->with('drivers', $drivers);
    }

    /**
     * Show the form for creating a new Drivers.
     *
     * @return Response
     */
    public function create()
    {
        $buses = Autobuses::orderBy('id')->get(['id'])->keyBy('id');

        return view('drivers.create',compact('buses'));
    }

    /**
     * Store a newly created Drivers in storage.
     *
     * @param CreateDriversRequest $request
     *
     * @return Response
     */
    public function store(CreateDriversRequest $request)
    {
        $input = $request->all();

        $drivers = $this->driversRepository->create($input);

        Flash::success('Drivers saved successfully.');

        return redirect(route('drivers.index'));
    }

    /**
     * Display the specified Drivers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $drivers = $this->driversRepository->findWithoutFail($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        return view('drivers.show')->with('drivers', $drivers);
    }

    /**
     * Show the form for editing the specified Drivers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $drivers = $this->driversRepository->findWithoutFail($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        return view('drivers.edit')->with('drivers', $drivers);
    }

    /**
     * Update the specified Drivers in storage.
     *
     * @param  int              $id
     * @param UpdateDriversRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriversRequest $request)
    {
        $drivers = $this->driversRepository->findWithoutFail($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        $drivers = $this->driversRepository->update($request->all(), $id);

        Flash::success('Drivers updated successfully.');

        return redirect(route('drivers.index'));
    }

    /**
     * Remove the specified Drivers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $drivers = $this->driversRepository->findWithoutFail($id);

        if (empty($drivers)) {
            Flash::error('Drivers not found');

            return redirect(route('drivers.index'));
        }

        $this->driversRepository->delete($id);

        Flash::success('Drivers deleted successfully.');

        return redirect(route('drivers.index'));
    }
}
