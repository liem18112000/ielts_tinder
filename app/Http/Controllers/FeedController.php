<?php

namespace App\Http\Controllers;

use App\Feed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class FeedController extends Controller
{

    /**
     * AUDIO_EXT
     *
     * @var array
     */
    protected $AUDIO_EXT = [
        'mp3',
        'wav',
        'ogg'
    ];

    /**
     * VIDEO_EXT
     *
     * @var array
     */
    protected $VIDEO_EXT = [
        'mp4',
        'webm',
        'ogg'
    ];


    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * mediaAnalyze
     *
     * @param  mixed $feeds
     * @return void
     */
    protected function mediaAnalyze($feeds){
        for ($i = 0; $i < count($feeds); $i++) {
            $tmp = explode(".", $feeds[$i]->media);
            $media_ext = end($tmp);
            $feeds[$i]->media_ext = $media_ext;
            if (in_array($media_ext, $this->AUDIO_EXT)) {
                $feeds[$i]->media_type = 'audio';
            } else if (in_array($media_ext, $this->VIDEO_EXT)) {
                $feeds[$i]->media_type = 'video';
            } else {
                $feeds[$i]->media_type = 'image';
            }
        }

        return $feeds;
    }

    /**
     * getResources
     *
     * @return void
     */
    public function getResources()
    {
        $resources = [];
        foreach(Feed::all() as $feed)
        {
            $resources[] = "storage/media/" . $feed->media;
        }

        return response()->json([
            'resources' => $resources
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $feeds = Feed::orderBy('updated_at', 'DESC')->get();

        return view('feed.index', [
        	'feeds' => $this->mediaAnalyze($feeds),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function moment()
    {
        return view('feed.moment', [
            'feeds' => $this->mediaAnalyze(Feed::orderBy('updated_at', 'DESC')->get()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('feed.create');
    }


	protected function validateNewFeed(Request $request)
	{
		return [
			'content' => $this->validateNewFeedContent($request),
			'media' => $this->validateNewFeedMedia($request)
		];
	}

	protected function validateNewFeedContent(Request $request)
	{
		return $request->validate([
			'title'		=> 'required|max:50',
			'content'	=> 'required',
		]);
	}

	protected function validateNewFeedMedia(Request $request)
	{
		return $request->validate([
			'media'		=> 'required',
		]);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
		$this->validateNewFeed($request);

        $media = $this->storeMediaCloudinary($request, 'media');

        $feed = Feed::create([
            'media'     => $this->encrypt($media),
            'title'     => $this->encrypt($request->title),
            'content'   => $this->encrypt($request->content),
            'user_id'   => Auth::user()->id,
            'status'    => 1,
        ]);

        activity()
            ->performedOn($feed)
            ->causedBy(Auth::user())
            ->log('Create new feed');

        Session::flash(
            'message',
            "Swal.fire(
                'Upload sucess!',
                'It look nice!',
                'success'
            )"
        );

        return redirect(route('feeds.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feed  $feed
     * @return Response
     */
    public function show(Feed $feed)
    {
        return view('feed.show', [
            'feed' => $feed
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feed  $feed
     * @return Response
     */
    public function editContent(Feed $feed)
    {
        return view('feed.edit-content', [
            'feed' => $feed
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feed  $feed
     * @return Response
     */
    public function editMedia(Feed $feed)
    {
        return view('feed.edit-media', [
            'feed' => $feed
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feed  $feed
     * @return Response
     */
    public function updateMedia(Request $request, Feed $feed)
    {

		$this->validateNewFeedMedia($request);

        $media = $this->storeMediaCloudinary($request, 'media');

        $feed->update([
            'media'     => $this->encrypt($media),
        ]);

        activity()
            ->performedOn($feed)
            ->causedBy(Auth::user())
            ->log('Update new feed media');

        Session::flash(
            'message',
                "Swal.fire(
                'Update sucess!',
                'It look nice!',
                'success'
            )"
        );

        return redirect(route('feeds.index'));
    }

    /**
     * updateContent
     *
     * @param  mixed $request
     * @param  mixed $feed
     * @return void
     */
    public function updateContent(Request $request, Feed $feed)
    {
		$this->validateNewFeedContent($request);

        $feed->update([
            'title'     => $this->encrypt($request->title),
            'content'   => $this->encrypt($request->content)
        ]);

        activity()
            ->performedOn($feed)
            ->causedBy(Auth::user())
            ->log('Update new feed content');

        Session::flash(
            'message',
            "Swal.fire(
                'Update sucess!',
                'It's look great!',
                'success'
            )"
        );

        return redirect(route('feeds.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feed  $feed
     * @return Response
     */
    public function delete(Feed $feed)
    {
        $feed->update([
            'status' => 0,
        ]);
        return redirect(route('feeds.index'));
    }
}
