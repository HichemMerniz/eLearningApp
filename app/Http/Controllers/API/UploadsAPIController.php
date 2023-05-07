<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUploadsAPIRequest;
use App\Http\Requests\API\UpdateUploadsAPIRequest;
use App\Models\Uploads;
use App\Repositories\UploadsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UploadsController
 * @package App\Http\Controllers\API
 */

class UploadsAPIController extends AppBaseController
{
    /** @var  UploadsRepository */
    private $uploadsRepository;

    public function __construct(UploadsRepository $uploadsRepo)
    {
        $this->uploadsRepository = $uploadsRepo;
    }

    /**
     * Display a listing of the Uploads.
     * GET|HEAD /uploads
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $uploads = $this->uploadsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($uploads->toArray(), 'Uploads retrieved successfully');
    }

    /**
     * Store a newly created Uploads in storage.
     * POST /uploads
     *
     * @param CreateUploadsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUploadsAPIRequest $request)
    {
        $input = $request->all();

        $uploads = $this->uploadsRepository->create($input);

        return $this->sendResponse($uploads->toArray(), 'Uploads saved successfully');
    }

    /**
     * Display the specified Uploads.
     * GET|HEAD /uploads/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Uploads $uploads */
        $uploads = $this->uploadsRepository->find($id);

        if (empty($uploads)) {
            return $this->sendError('Uploads not found');
        }

        return $this->sendResponse($uploads->toArray(), 'Uploads retrieved successfully');
    }

    /**
     * Update the specified Uploads in storage.
     * PUT/PATCH /uploads/{id}
     *
     * @param int $id
     * @param UpdateUploadsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUploadsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Uploads $uploads */
        $uploads = $this->uploadsRepository->find($id);

        if (empty($uploads)) {
            return $this->sendError('Uploads not found');
        }

        $uploads = $this->uploadsRepository->update($input, $id);

        return $this->sendResponse($uploads->toArray(), 'Uploads updated successfully');
    }

    /**
     * Remove the specified Uploads from storage.
     * DELETE /uploads/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Uploads $uploads */
        $uploads = $this->uploadsRepository->find($id);

        if (empty($uploads)) {
            return $this->sendError('Uploads not found');
        }

        $uploads->delete();

        return $this->sendSuccess('Uploads deleted successfully');
    }
}
