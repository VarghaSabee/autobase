<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoutesRequest;
use App\Http\Requests\UpdateRoutesRequest;
use App\Models\Routes;
use App\Repositories\RoutesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Cities;

class RoutesController extends AppBaseController
{
    /** @var  RoutesRepository */
    private $routesRepository;

    public function __construct(RoutesRepository $routesRepo)
    {
        $this->routesRepository = $routesRepo;
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
        return view('routes.create');
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

        if (empty($routes)) {
            Flash::error('Routes not found');

            return redirect(route('routes.index'));
        }

        return view('routes.edit')->with('routes', $routes);
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

        $cities = Cities::all();
        $routes = Routes::all();

       // dd($request);
        return view('search', compact('routes','cities'));
    }
}
