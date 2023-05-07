<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCoursePublierRequest;
use App\Http\Requests\UpdateCoursePublierRequest;
use App\Repositories\CoursePublierRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CoursePublierController extends AppBaseController
{
    /** @var CoursePublierRepository $coursePublierRepository*/
    private $coursePublierRepository;

    public function __construct(CoursePublierRepository $coursePublierRepo)
    {
        $this->coursePublierRepository = $coursePublierRepo;
    }

    /**
     * Display a listing of the CoursePublier.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $coursePubliers = $this->coursePublierRepository->all();

        return view('course_publiers.index')
            ->with('coursePubliers', $coursePubliers);
    }

    /**
     * Show the form for creating a new CoursePublier.
     *
     * @return Response
     */
    public function create()
    {
        return view('course_publiers.create');
    }

    /**
     * Store a newly created CoursePublier in storage.
     *
     * @param CreateCoursePublierRequest $request
     *
     * @return Response
     */
    public function store(CreateCoursePublierRequest $request)
    {
        $input = $request->all();

        $coursePublier = $this->coursePublierRepository->create($input);

        Flash::success('Course Publier saved successfully.');

        return redirect(route('coursePubliers.index'));
    }

    /**
     * Display the specified CoursePublier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $coursePublier = $this->coursePublierRepository->find($id);

        if (empty($coursePublier)) {
            Flash::error('Course Publier not found');

            return redirect(route('coursePubliers.index'));
        }

        return view('course_publiers.show')->with('coursePublier', $coursePublier);
    }

    /**
     * Show the form for editing the specified CoursePublier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $coursePublier = $this->coursePublierRepository->find($id);

        if (empty($coursePublier)) {
            Flash::error('Course Publier not found');

            return redirect(route('coursePubliers.index'));
        }

        return view('course_publiers.edit')->with('coursePublier', $coursePublier);
    }

    /**
     * Update the specified CoursePublier in storage.
     *
     * @param int $id
     * @param UpdateCoursePublierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoursePublierRequest $request)
    {
        $coursePublier = $this->coursePublierRepository->find($id);

        if (empty($coursePublier)) {
            Flash::error('Course Publier not found');

            return redirect(route('coursePubliers.index'));
        }

        $coursePublier = $this->coursePublierRepository->update($request->all(), $id);

        Flash::success('Course Publier updated successfully.');

        return redirect(route('coursePubliers.index'));
    }

    /**
     * Remove the specified CoursePublier from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $coursePublier = $this->coursePublierRepository->find($id);

        if (empty($coursePublier)) {
            Flash::error('Course Publier not found');

            return redirect(route('coursePubliers.index'));
        }

        $this->coursePublierRepository->delete($id);

        Flash::success('Course Publier deleted successfully.');

        return redirect(route('coursePubliers.index'));
    }
}
