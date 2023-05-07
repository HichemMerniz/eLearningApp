<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExamesAPIRequest;
use App\Http\Requests\API\UpdateExamesAPIRequest;
use App\Models\Exames;
use App\Repositories\ExamesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ExamesController
 * @package App\Http\Controllers\API
 */

class ExamesAPIController extends AppBaseController
{
    /** @var  ExamesRepository */
    private $examesRepository;

    public function __construct(ExamesRepository $examesRepo)
    {
        $this->examesRepository = $examesRepo;
    }

    /**
     * Display a listing of the Exames.
     * GET|HEAD /exames
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $exames = $this->examesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($exames->toArray(), 'Exames retrieved successfully');
    }

    /**
     * Store a newly created Exames in storage.
     * POST /exames
     *
     * @param CreateExamesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateExamesAPIRequest $request)
    {
        $input = $request->all();

        $exames = $this->examesRepository->create($input);

        return $this->sendResponse($exames->toArray(), 'Exames saved successfully');
    }

    /**
     * Display the specified Exames.
     * GET|HEAD /exames/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Exames $exames */
        $exames = $this->examesRepository->find($id);

        if (empty($exames)) {
            return $this->sendError('Exames not found');
        }

        return $this->sendResponse($exames->toArray(), 'Exames retrieved successfully');
    }

    /**
     * Update the specified Exames in storage.
     * PUT/PATCH /exames/{id}
     *
     * @param int $id
     * @param UpdateExamesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExamesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Exames $exames */
        $exames = $this->examesRepository->find($id);

        if (empty($exames)) {
            return $this->sendError('Exames not found');
        }

        $exames = $this->examesRepository->update($input, $id);

        return $this->sendResponse($exames->toArray(), 'Exames updated successfully');
    }

    /**
     * Remove the specified Exames from storage.
     * DELETE /exames/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Exames $exames */
        $exames = $this->examesRepository->find($id);

        if (empty($exames)) {
            return $this->sendError('Exames not found');
        }

        $exames->delete();

        return $this->sendSuccess('Exames deleted successfully');
    }
}
