<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateavailableRequest;
use App\Http\Requests\UpdateavailableRequest;
use App\Repositories\availableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class availableController extends AppBaseController
{
    /** @var  availableRepository */
    private $availableRepository;

    public function __construct(availableRepository $availableRepo)
    {
        $this->availableRepository = $availableRepo;
    }

    /**
     * Display a listing of the available.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->availableRepository->pushCriteria(new RequestCriteria($request));
        $availables = $this->availableRepository->all();

        return view('availables.index')
            ->with('availables', $availables);
    }

    /**
     * Show the form for creating a new available.
     *
     * @return Response
     */
    public function create()
    {
        return view('availables.create');
    }

    /**
     * Store a newly created available in storage.
     *
     * @param CreateavailableRequest $request
     *
     * @return Response
     */
    public function store(CreateavailableRequest $request)
    {
        $input = $request->all();

        $available = $this->availableRepository->create($input);

        Flash::success('Available saved successfully.');

        return redirect(route('availables.index'));
    }

    /**
     * Display the specified available.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $available = $this->availableRepository->findWithoutFail($id);

        if (empty($available)) {
            Flash::error('Available not found');

            return redirect(route('availables.index'));
        }

        return view('availables.show')->with('available', $available);
    }

    /**
     * Show the form for editing the specified available.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $available = $this->availableRepository->findWithoutFail($id);

        if (empty($available)) {
            Flash::error('Available not found');

            return redirect(route('availables.index'));
        }

        return view('availables.edit')->with('available', $available);
    }

    /**
     * Update the specified available in storage.
     *
     * @param  int              $id
     * @param UpdateavailableRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateavailableRequest $request)
    {
        $available = $this->availableRepository->findWithoutFail($id);

        if (empty($available)) {
            Flash::error('Available not found');

            return redirect(route('availables.index'));
        }

        $available = $this->availableRepository->update($request->all(), $id);

        Flash::success('Available updated successfully.');

        return redirect(route('availables.index'));
    }

    /**
     * Remove the specified available from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $available = $this->availableRepository->findWithoutFail($id);

        if (empty($available)) {
            Flash::error('Available not found');

            return redirect(route('availables.index'));
        }

        $this->availableRepository->delete($id);

        Flash::success('Available deleted successfully.');

        return redirect(route('availables.index'));
    }
}
