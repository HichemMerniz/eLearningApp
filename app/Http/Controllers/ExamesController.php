<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExamesRequest;
use App\Http\Requests\UpdateExamesRequest;
use App\Repositories\ExamesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ExamesController extends AppBaseController
{
    /** @var ExamesRepository $examesRepository*/
    private $examesRepository;

    public function __construct(ExamesRepository $examesRepo)
    {
        $this->examesRepository = $examesRepo;
    }

    /**
     * Display a listing of the Exames.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $exames = $this->examesRepository->all();

        return view('exames.index')
            ->with('exames', $exames);
    }

    /**
     * Show the form for creating a new Exames.
     *
     * @return Response
     */
    public function create()
    {
        return view('exames.create');
    }

    /**
     * Store a newly created Exames in storage.
     *
     * @param CreateExamesRequest $request
     *
     * @return Response
     */
    public function store(CreateExamesRequest $request)
    {
        $input = $request->all();

        $exames = $this->examesRepository->create($input);

        Flash::success('Exames saved successfully.');

        return redirect(route('exames.index'));
    }

    /**
     * Display the specified Exames.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $exames = $this->examesRepository->find($id);

        if (empty($exames)) {
            Flash::error('Exames not found');

            return redirect(route('exames.index'));
        }

        return view('exames.show')->with('exames', $exames);
    }

    /**
     * Show the form for editing the specified Exames.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $exames = $this->examesRepository->find($id);

        if (empty($exames)) {
            Flash::error('Exames not found');

            return redirect(route('exames.index'));
        }

        return view('exames.edit')->with('exames', $exames);
    }

    /**
     * Update the specified Exames in storage.
     *
     * @param int $id
     * @param UpdateExamesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExamesRequest $request)
    {
        $exames = $this->examesRepository->find($id);

        if (empty($exames)) {
            Flash::error('Exames not found');

            return redirect(route('exames.index'));
        }

        $exames = $this->examesRepository->update($request->all(), $id);

        Flash::success('Exames updated successfully.');

        return redirect(route('exames.index'));
    }

    /**
     * Remove the specified Exames from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $exames = $this->examesRepository->find($id);

        if (empty($exames)) {
            Flash::error('Exames not found');

            return redirect(route('exames.index'));
        }

        $this->examesRepository->delete($id);

        Flash::success('Exames deleted successfully.');

        return redirect(route('exames.index'));
    }
}
