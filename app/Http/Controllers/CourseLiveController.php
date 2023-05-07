<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseLiveRequest;
use App\Http\Requests\UpdateCourseLiveRequest;
use App\Repositories\CourseLiveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CourseLiveController extends AppBaseController
{
    /** @var CourseLiveRepository $courseLiveRepository*/
    private $courseLiveRepository;

    public function __construct(CourseLiveRepository $courseLiveRepo)
    {
        $this->courseLiveRepository = $courseLiveRepo;
    }

    /**
     * Display a listing of the CourseLive.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $courseLives = $this->courseLiveRepository->all();

        return view('course_lives.index')
            ->with('courseLives', $courseLives);
    }

    /**
     * Show the form for creating a new CourseLive.
     *
     * @return Response
     */
    public function create()
    {
        return view('course_lives.create');
    }

    /**
     * Store a newly created CourseLive in storage.
     *
     * @param CreateCourseLiveRequest $request
     *
     * @return Response
     */
    public function store(CreateCourseLiveRequest $request)
    {
        $input = $request->all();

        $courseLive = $this->courseLiveRepository->create($input);

        Flash::success('Course Live saved successfully.');

        return redirect(route('courseLives.index'));
    }

    /**
     * Display the specified CourseLive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $courseLive = $this->courseLiveRepository->find($id);

        if (empty($courseLive)) {
            Flash::error('Course Live not found');

            return redirect(route('courseLives.index'));
        }

        return view('course_lives.show')->with('courseLive', $courseLive);
    }

    /**
     * Show the form for editing the specified CourseLive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $courseLive = $this->courseLiveRepository->find($id);

        if (empty($courseLive)) {
            Flash::error('Course Live not found');

            return redirect(route('courseLives.index'));
        }

        return view('course_lives.edit')->with('courseLive', $courseLive);
    }

    /**
     * Update the specified CourseLive in storage.
     *
     * @param int $id
     * @param UpdateCourseLiveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourseLiveRequest $request)
    {
        $courseLive = $this->courseLiveRepository->find($id);

        if (empty($courseLive)) {
            Flash::error('Course Live not found');

            return redirect(route('courseLives.index'));
        }

        $courseLive = $this->courseLiveRepository->update($request->all(), $id);

        Flash::success('Course Live updated successfully.');

        return redirect(route('courseLives.index'));
    }

    /**
     * Remove the specified CourseLive from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $courseLive = $this->courseLiveRepository->find($id);

        if (empty($courseLive)) {
            Flash::error('Course Live not found');

            return redirect(route('courseLives.index'));
        }

        $this->courseLiveRepository->delete($id);

        Flash::success('Course Live deleted successfully.');

        return redirect(route('courseLives.index'));
    }
}
