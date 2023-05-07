<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCourseLiveAPIRequest;
use App\Http\Requests\API\UpdateCourseLiveAPIRequest;
use App\Models\CourseLive;
use App\Repositories\CourseLiveRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CourseLiveController
 * @package App\Http\Controllers\API
 */

class CourseLiveAPIController extends AppBaseController
{
    /** @var  CourseLiveRepository */
    private $courseLiveRepository;

    public function __construct(CourseLiveRepository $courseLiveRepo)
    {
        $this->courseLiveRepository = $courseLiveRepo;
    }

    /**
     * Display a listing of the CourseLive.
     * GET|HEAD /courseLives
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $courseLives = $this->courseLiveRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($courseLives->toArray(), 'Course Lives retrieved successfully');
    }

    /**
     * Store a newly created CourseLive in storage.
     * POST /courseLives
     *
     * @param CreateCourseLiveAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCourseLiveAPIRequest $request)
    {
        $input = $request->all();

        $courseLive = $this->courseLiveRepository->create($input);

        return $this->sendResponse($courseLive->toArray(), 'Course Live saved successfully');
    }

    /**
     * Display the specified CourseLive.
     * GET|HEAD /courseLives/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CourseLive $courseLive */
        $courseLive = $this->courseLiveRepository->find($id);

        if (empty($courseLive)) {
            return $this->sendError('Course Live not found');
        }

        return $this->sendResponse($courseLive->toArray(), 'Course Live retrieved successfully');
    }

    /**
     * Update the specified CourseLive in storage.
     * PUT/PATCH /courseLives/{id}
     *
     * @param int $id
     * @param UpdateCourseLiveAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourseLiveAPIRequest $request)
    {
        $input = $request->all();

        /** @var CourseLive $courseLive */
        $courseLive = $this->courseLiveRepository->find($id);

        if (empty($courseLive)) {
            return $this->sendError('Course Live not found');
        }

        $courseLive = $this->courseLiveRepository->update($input, $id);

        return $this->sendResponse($courseLive->toArray(), 'CourseLive updated successfully');
    }

    /**
     * Remove the specified CourseLive from storage.
     * DELETE /courseLives/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CourseLive $courseLive */
        $courseLive = $this->courseLiveRepository->find($id);

        if (empty($courseLive)) {
            return $this->sendError('Course Live not found');
        }

        $courseLive->delete();

        return $this->sendSuccess('Course Live deleted successfully');
    }
}
