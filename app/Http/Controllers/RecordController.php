<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class RecordController extends Controller
{

    protected $sid;
    protected $token;
    protected $key;
    protected $secret;

    public function __construct()
    {
        $this->middleware('auth');
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.token');
        $this->key = config('services.twilio.key');
        $this->secret = config('services.twilio.secret');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Record::all();

        $client = new Client($this->sid, $this->token);

        $mediaLocation = [];

        foreach ($records as $record) {

            $uri = "https://video.twilio.com/v1/" .
            "Rooms/" . $record->RoomSid . "/" .
            "Recordings/" . $record->RecordingSid . "/" .
            "Media/";

            $response = $client->request("GET", $uri);

            $mediaLocation[$record->RecordingSid] = $response->getContent()["redirect_to"];
        }

        return view('record.index', [
            'records' => $records,
            'mediaLocation' => $mediaLocation
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }
}
