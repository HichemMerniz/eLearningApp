<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubSectionRequest;
use App\Http\Requests\UpdateSubSectionRequest;
use App\Repositories\SubSectionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SubSectionController extends AppBaseController
{
    /** @var SubSectionRepository $subSectionRepository*/
    private $subSectionRepository;

    public function __construct(SubSectionRepository $subSectionRepo)
    {
        $this->subSectionRepository = $subSectionRepo;
    }

    /**
     * Display a listing of the SubSection.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subSections = $this->subSectionRepository->all();

        return view('sub_sections.index')
            ->with('subSections', $subSections);
    }

    /**
     * Show the form for creating a new SubSection.
     *
     * @return Response
     */
    public function create()
    {
        return view('sub_sections.create');
    }

    /**
     * Store a newly created SubSection in storage.
     *
     * @param CreateSubSectionRequest $request
     *
     * @return Response
     */
    public function store(CreateSubSectionRequest $request)
    {
        $input = $request->all();

        $subSection = $this->subSectionRepository->create($input);

        Flash::success('Sub Section saved successfully.');

        return redirect(route('subSections.index'));
    }

    /**
     * Display the specified SubSection.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subSection = $this->subSectionRepository->find($id);

        if (empty($subSection)) {
            Flash::error('Sub Section not found');

            return redirect(route('subSections.index'));
        }

        return view('sub_sections.show')->with('subSection', $subSection);
    }

    /**
     * Show the form for editing the specified SubSection.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subSection = $this->subSectionRepository->find($id);

        if (empty($subSection)) {
            Flash::error('Sub Section not found');

            return redirect(route('subSections.index'));
        }

        return view('sub_sections.edit')->with('subSection', $subSection);
    }

    /**
     * Update the specified SubSection in storage.
     *
     * @param int $id
     * @param UpdateSubSectionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubSectionRequest $request)
    {
        $subSection = $this->subSectionRepository->find($id);

        if (empty($subSection)) {
            Flash::error('Sub Section not found');

            return redirect(route('subSections.index'));
        }

        $subSection = $this->subSectionRepository->update($request->all(), $id);

        Flash::success('Sub Section updated successfully.');

        return redirect(route('subSections.index'));
    }

    /**
     * Remove the specified SubSection from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subSection = $this->subSectionRepository->find($id);

        if (empty($subSection)) {
            Flash::error('Sub Section not found');

            return redirect(route('subSections.index'));
        }

        $this->subSectionRepository->delete($id);

        Flash::success('Sub Section deleted successfully.');

        return redirect(route('subSections.index'));
    }
}
