<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Repositories\VideoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class VideoController extends AppBaseController
{
    /** @var VideoRepository $videoRepository*/
    private $videoRepository;

    public function __construct(VideoRepository $videoRepo)
    {
        $this->videoRepository = $videoRepo;
    }

    /**
     * Display a listing of the Video.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $videos = $this->videoRepository->all();

        return view('videos.index')
            ->with('videos', $videos);
    }

    /**
     * Show the form for creating a new Video.
     *
     * @return Response
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created Video in storage.
     *
     * @param CreateVideoRequest $request
     *
     * @return Response
     */
    public function store(CreateVideoRequest $request)
    {
        $input = $request->all();

        $video = $this->videoRepository->create($input);

        Flash::success('Video saved successfully.');

        return redirect(route('videos.index'));
    }

    /**
     * Display the specified Video.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $video = $this->videoRepository->find($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }

        return view('videos.show')->with('video', $video);
    }

    /**
     * Show the form for editing the specified Video.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $video = $this->videoRepository->find($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }

        return view('videos.edit')->with('video', $video);
    }

    /**
     * Update the specified Video in storage.
     *
     * @param int $id
     * @param UpdateVideoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideoRequest $request)
    {
        $video = $this->videoRepository->find($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }

        $video = $this->videoRepository->update($request->all(), $id);

        Flash::success('Video updated successfully.');

        return redirect(route('videos.index'));
    }

    /**
     * Remove the specified Video from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $video = $this->videoRepository->find($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }

        $this->videoRepository->delete($id);

        Flash::success('Video deleted successfully.');

        return redirect(route('videos.index'));
    }
}
