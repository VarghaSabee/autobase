<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAutobusesRequest;
use App\Http\Requests\UpdateAutobusesRequest;
use App\Repositories\AutobusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AutobusesController extends AppBaseController
{
    /** @var  AutobusesRepository */
    private $autobusesRepository;

    public function __construct(AutobusesRepository $autobusesRepo)
    {
        $this->autobusesRepository = $autobusesRepo;
    }

    /**
     * Display a listing of the Autobuses.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->autobusesRepository->pushCriteria(new RequestCriteria($request));
        $autobuses = $this->autobusesRepository->all();

        return view('autobuses.index')
            ->with('autobuses', $autobuses);
    }

    /**
     * Show the form for creating a new Autobuses.
     *
     * @return Response
     */
    public function create()
    {

        return view('autobuses.create');
    }

    /**
     * Store a newly created Autobuses in storage.
     *
     * @param CreateAutobusesRequest $request
     *
     * @return Response
     */
    public function store(CreateAutobusesRequest $request)
    {
        $input = $request->all();

        $autobuses = $this->autobusesRepository->create($input);

        Flash::success('Autobuses saved successfully.');

        return redirect(route('autobuses.index'));
    }

    /**
     * Display the specified Autobuses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $autobuses = $this->autobusesRepository->findWithoutFail($id);

        if (empty($autobuses)) {
            Flash::error('Autobuses not found');

            return redirect(route('autobuses.index'));
        }

        return view('autobuses.show')->with('autobuses', $autobuses);
    }

    /**
     * Show the form for editing the specified Autobuses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $autobuses = $this->autobusesRepository->findWithoutFail($id);

        if (empty($autobuses)) {
            Flash::error('Autobuses not found');

            return redirect(route('autobuses.index'));
        }

        return view('autobuses.edit')->with('autobuses', $autobuses);
    }

    /**
     * Update the specified Autobuses in storage.
     *
     * @param  int              $id
     * @param UpdateAutobusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAutobusesRequest $request)
    {
        $autobuses = $this->autobusesRepository->findWithoutFail($id);

        if (empty($autobuses)) {
            Flash::error('Autobuses not found');

            return redirect(route('autobuses.index'));
        }

        $autobuses = $this->autobusesRepository->update($request->all(), $id);

        Flash::success('Autobuses updated successfully.');

        return redirect(route('autobuses.index'));
    }

    /**
     * Remove the specified Autobuses from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $autobuses = $this->autobusesRepository->findWithoutFail($id);

        if (empty($autobuses)) {
            Flash::error('Autobuses not found');

            return redirect(route('autobuses.index'));
        }

        $this->autobusesRepository->delete($id);

        Flash::success('Autobuses deleted successfully.');

        return redirect(route('autobuses.index'));
    }
}
