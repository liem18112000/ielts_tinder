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

    protected $AUDIO_EXT = [
        'mp3',
        'wav',
        'ogg'
    ];

    protected $VIDEO_EXT = [
        'mp4',
        'webm',
        'ogg'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::orderBy('updated_at', 'DESC')->get();

        return view('feed.index', [
          'feeds' => $this->mediaAnalyze($feeds),
        ]);
    }

    public function getMedia(Feed $feed)
    {
        $path = storage_path($feed->media);

        if (!File::exists($path)) abort(404, "Media not found...");

        $file = File::get($path);

        $type = File::mimeType($path);

        $response = Response::make($file, 200);

        $response->header("Content-Type", $type);

        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $media = $this->storeMedia($request, 'media', 'public/media');

        Feed::create([
            'media' => $media,
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('feeds.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function updateMedia(Request $request, Feed $feed)
    {

        $media = $this->storeMedia($request, 'media', 'public/media');

        $feed->update([
            'media'     => $media,
        ]);

        Session::flash(
            'message',
                "Swal.fire(
                'Update failed!',
                'Please try again!',
                'warning'
            )"
        );

        return redirect(route('feeds.index'));
    }

    public function updateContent(Request $request, Feed $feed)
    {

        $feed->update([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feed $feed)
    {
        //
    }
}
