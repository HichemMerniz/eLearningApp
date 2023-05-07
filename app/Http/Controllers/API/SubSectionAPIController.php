<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubSectionAPIRequest;
use App\Http\Requests\API\UpdateSubSectionAPIRequest;
use App\Models\SubSection;
use App\Repositories\SubSectionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SubSectionController
 * @package App\Http\Controllers\API
 */

class SubSectionAPIController extends AppBaseController
{
    /** @var  SubSectionRepository */
    private $subSectionRepository;

    public function __construct(SubSectionRepository $subSectionRepo)
    {
        $this->subSectionRepository = $subSectionRepo;
    }

    /**
     * Display a listing of the SubSection.
     * GET|HEAD /subSections
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subSections = $this->subSectionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subSections->toArray(), 'Sub Sections retrieved successfully');
    }

    /**
     * Store a newly created SubSection in storage.
     * POST /subSections
     *
     * @param CreateSubSectionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubSectionAPIRequest $request)
    {
        $input = $request->all();

        $subSection = $this->subSectionRepository->create($input);

        return $this->sendResponse($subSection->toArray(), 'Sub Section saved successfully');
    }

    /**
     * Display the specified SubSection.
     * GET|HEAD /subSections/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubSection $subSection */
        $subSection = $this->subSectionRepository->find($id);

        if (empty($subSection)) {
            return $this->sendError('Sub Section not found');
        }

        return $this->sendResponse($subSection->toArray(), 'Sub Section retrieved successfully');
    }

    /**
     * Update the specified SubSection in storage.
     * PUT/PATCH /subSections/{id}
     *
     * @param int $id
     * @param UpdateSubSectionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubSectionAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubSection $subSection */
        $subSection = $this->subSectionRepository->find($id);

        if (empty($subSection)) {
            return $this->sendError('Sub Section not found');
        }

        $subSection = $this->subSectionRepository->update($input, $id);

        return $this->sendResponse($subSection->toArray(), 'SubSection updated successfully');
    }

    /**
     * Remove the specified SubSection from storage.
     * DELETE /subSections/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SubSection $subSection */
        $subSection = $this->subSectionRepository->find($id);

        if (empty($subSection)) {
            return $this->sendError('Sub Section not found');
        }

        $subSection->delete();

        return $this->sendSuccess('Sub Section deleted successfully');
    }
}
