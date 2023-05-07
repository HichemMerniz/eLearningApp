<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUploadsRequest;
use App\Http\Requests\UpdateUploadsRequest;
use App\Repositories\UploadsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class UploadsController extends AppBaseController
{
    /** @var UploadsRepository $uploadsRepository*/
    private $uploadsRepository;

    public function __construct(UploadsRepository $uploadsRepo)
    {
        $this->uploadsRepository = $uploadsRepo;
    }

    /**
     * Display a listing of the Uploads.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $uploads = $this->uploadsRepository->all();

        return view('uploads.index')
            ->with('uploads', $uploads);
    }

    /**
     * Show the form for creating a new Uploads.
     *
     * @return Response
     */
    public function create()
    {
        return view('uploads.create');
    }

    /**
     * Store a newly created Uploads in storage.
     *
     * @param CreateUploadsRequest $request
     *
     * @return Response
     */
    public function store(CreateUploadsRequest $request)
    {
        $input = $request->all();

        $uploads = $this->uploadsRepository->create($input);

        Flash::success('Uploads saved successfully.');

        return redirect(route('uploads.index'));
    }

    /**
     * Display the specified Uploads.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $uploads = $this->uploadsRepository->find($id);

        if (empty($uploads)) {
            Flash::error('Uploads not found');

            return redirect(route('uploads.index'));
        }

        return view('uploads.show')->with('uploads', $uploads);
    }

    /**
     * Show the form for editing the specified Uploads.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $uploads = $this->uploadsRepository->find($id);

        if (empty($uploads)) {
            Flash::error('Uploads not found');

            return redirect(route('uploads.index'));
        }

        return view('uploads.edit')->with('uploads', $uploads);
    }

    /**
     * Update the specified Uploads in storage.
     *
     * @param int $id
     * @param UpdateUploadsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUploadsRequest $request)
    {
        $uploads = $this->uploadsRepository->find($id);

        if (empty($uploads)) {
            Flash::error('Uploads not found');

            return redirect(route('uploads.index'));
        }

        $uploads = $this->uploadsRepository->update($request->all(), $id);

        Flash::success('Uploads updated successfully.');

        return redirect(route('uploads.index'));
    }

    /**
     * Remove the specified Uploads from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $uploads = $this->uploadsRepository->find($id);

        if (empty($uploads)) {
            Flash::error('Uploads not found');

            return redirect(route('uploads.index'));
        }

        $this->uploadsRepository->delete($id);

        Flash::success('Uploads deleted successfully.');

        return redirect(route('uploads.index'));
    }
}
