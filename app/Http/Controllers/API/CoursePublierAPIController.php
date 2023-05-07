<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCoursePublierAPIRequest;
use App\Http\Requests\API\UpdateCoursePublierAPIRequest;
use App\Models\CoursePublier;
use App\Repositories\CoursePublierRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CoursePublierController
 * @package App\Http\Controllers\API
 */

class CoursePublierAPIController extends AppBaseController
{
    /** @var  CoursePublierRepository */
    private $coursePublierRepository;

    public function __construct(CoursePublierRepository $coursePublierRepo)
    {
        $this->coursePublierRepository = $coursePublierRepo;
    }

    /**
     * Display a listing of the CoursePublier.
     * GET|HEAD /coursePubliers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $coursePubliers = $this->coursePublierRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($coursePubliers->toArray(), 'Course Publiers retrieved successfully');
    }

    /**
     * Store a newly created CoursePublier in storage.
     * POST /coursePubliers
     *
     * @param CreateCoursePublierAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCoursePublierAPIRequest $request)
    {
        $input = $request->all();

        $coursePublier = $this->coursePublierRepository->create($input);

        return $this->sendResponse($coursePublier->toArray(), 'Course Publier saved successfully');
    }

    /**
     * Display the specified CoursePublier.
     * GET|HEAD /coursePubliers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CoursePublier $coursePublier */
        $coursePublier = $this->coursePublierRepository->find($id);

        if (empty($coursePublier)) {
            return $this->sendError('Course Publier not found');
        }

        return $this->sendResponse($coursePublier->toArray(), 'Course Publier retrieved successfully');
    }

    /**
     * Update the specified CoursePublier in storage.
     * PUT/PATCH /coursePubliers/{id}
     *
     * @param int $id
     * @param UpdateCoursePublierAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoursePublierAPIRequest $request)
    {
        $input = $request->all();

        /** @var CoursePublier $coursePublier */
        $coursePublier = $this->coursePublierRepository->find($id);

        if (empty($coursePublier)) {
            return $this->sendError('Course Publier not found');
        }

        $coursePublier = $this->coursePublierRepository->update($input, $id);

        return $this->sendResponse($coursePublier->toArray(), 'CoursePublier updated successfully');
    }

    /**
     * Remove the specified CoursePublier from storage.
     * DELETE /coursePubliers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CoursePublier $coursePublier */
        $coursePublier = $this->coursePublierRepository->find($id);

        if (empty($coursePublier)) {
            return $this->sendError('Course Publier not found');
        }

        $coursePublier->delete();

        return $this->sendSuccess('Course Publier deleted successfully');
    }
}
