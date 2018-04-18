<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCitiesRequest;
use App\Http\Requests\UpdateCitiesRequest;
use App\Repositories\CitiesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CitiesController extends AppBaseController
{
    /** @var  CitiesRepository */
    private $citiesRepository;

    public function __construct(CitiesRepository $citiesRepo)
    {
        $this->citiesRepository = $citiesRepo;
    }

    /**
     * Display a listing of the Cities.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->citiesRepository->pushCriteria(new RequestCriteria($request));
        $cities = $this->citiesRepository->all();

        return view('cities.index')
            ->with('cities', $cities);
    }

    /**
     * Show the form for creating a new Cities.
     *
     * @return Response
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created Cities in storage.
     *
     * @param CreateCitiesRequest $request
     *
     * @return Response
     */
    public function store(CreateCitiesRequest $request)
    {
        $input = $request->all();

        $cities = $this->citiesRepository->create($input);

        Flash::success('Cities saved successfully.');

        return redirect(route('cities.index'));
    }

    /**
     * Display the specified Cities.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cities = $this->citiesRepository->findWithoutFail($id);

        if (empty($cities)) {
            Flash::error('Cities not found');

            return redirect(route('cities.index'));
        }

        return view('cities.show')->with('cities', $cities);
    }

    /**
     * Show the form for editing the specified Cities.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cities = $this->citiesRepository->findWithoutFail($id);

        if (empty($cities)) {
            Flash::error('Cities not found');

            return redirect(route('cities.index'));
        }

        return view('cities.edit')->with('cities', $cities);
    }

    /**
     * Update the specified Cities in storage.
     *
     * @param  int              $id
     * @param UpdateCitiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCitiesRequest $request)
    {
        $cities = $this->citiesRepository->findWithoutFail($id);

        if (empty($cities)) {
            Flash::error('Cities not found');

            return redirect(route('cities.index'));
        }

        $cities = $this->citiesRepository->update($request->all(), $id);

        Flash::success('Cities updated successfully.');

        return redirect(route('cities.index'));
    }

    /**
     * Remove the specified Cities from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cities = $this->citiesRepository->findWithoutFail($id);

        if (empty($cities)) {
            Flash::error('Cities not found');

            return redirect(route('cities.index'));
        }

        $this->citiesRepository->delete($id);

        Flash::success('Cities deleted successfully.');

        return redirect(route('cities.index'));
    }
}
