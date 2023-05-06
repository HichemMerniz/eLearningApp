<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCoursesAPIRequest;
use App\Http\Requests\API\UpdateCoursesAPIRequest;
use App\Models\Courses;
use App\Repositories\CoursesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CoursesController
 * @package App\Http\Controllers\API
 */

class CoursesAPIController extends AppBaseController
{
    /** @var  CoursesRepository */
    private $coursesRepository;

    public function __construct(CoursesRepository $coursesRepo)
    {
        $this->coursesRepository = $coursesRepo;
    }

    /**
     * Display a listing of the Courses.
     * GET|HEAD /courses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $courses = $this->coursesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($courses->toArray(), 'Courses retrieved successfully');
    }

    /**
     * Store a newly created Courses in storage.
     * POST /courses
     *
     * @param CreateCoursesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCoursesAPIRequest $request)
    {
        $input = $request->all();

        $courses = $this->coursesRepository->create($input);

        return $this->sendResponse($courses->toArray(), 'Courses saved successfully');
    }

    /**
     * Display the specified Courses.
     * GET|HEAD /courses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Courses $courses */
        $courses = $this->coursesRepository->find($id);

        if (empty($courses)) {
            return $this->sendError('Courses not found');
        }

        return $this->sendResponse($courses->toArray(), 'Courses retrieved successfully');
    }

    /**
     * Update the specified Courses in storage.
     * PUT/PATCH /courses/{id}
     *
     * @param int $id
     * @param UpdateCoursesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoursesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Courses $courses */
        $courses = $this->coursesRepository->find($id);

        if (empty($courses)) {
            return $this->sendError('Courses not found');
        }

        $courses = $this->coursesRepository->update($input, $id);

        return $this->sendResponse($courses->toArray(), 'Courses updated successfully');
    }

    /**
     * Remove the specified Courses from storage.
     * DELETE /courses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Courses $courses */
        $courses = $this->coursesRepository->find($id);

        if (empty($courses)) {
            return $this->sendError('Courses not found');
        }

        $courses->delete();

        return $this->sendSuccess('Courses deleted successfully');
    }
}
