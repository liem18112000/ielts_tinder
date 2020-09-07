<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class VideoRoomController extends Controller
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


    public function join($room)
    {
        // A unique identifier for this user
        $identity = Auth::user()->name . "@" . rand(3,10000);

        Log::debug("joined with identity: $identity");
        $token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);

        $videoGrant = new VideoGrant();
        $videoGrant->setRoom($room);

        $token->addGrant($videoGrant);

        return view('room.room',[
            'accessToken'   => $token->toJWT(),
            'room'          => $room,
            'identity'      => $identity,
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = [];
        try {
            $client = new Client($this->sid, $this->token);
            $allRooms = $client->video->rooms->read([]);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return view('room.index', ['rooms' => $allRooms, 'newRoomName' => 'IELTS_TINDER_' . rand(1000, 9999)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $client = new Client($this->sid, $this->token);

        $exists = $client->video->rooms->read(['uniqueName' => $request->roomName]);

        if (empty($exists)) {
            $client->video->rooms->create([
                'uniqueName'                    => $request->room,
                'type'                          => $request->type,
                'recordParticipantsOnConnect'   => true
            ]);

            Log::debug("created new room: " . $request->room);
            
            Room::create([
                'name' => $request->room,
                'created_at'=> now(),
                'status' => 1, 
            ]);

            \DB::table('joins')->insert([
                'user_id' => Auth::user()->id,
                'room_id' => Room::where('name', $request->room)->firstOrFail()->id,
                'open_stamp' => Room::where('name', $request->room)->firstOrFail()->created_at,
                'created_at' => now(),
            ]);
        }

        return redirect()->action('VideoRoomController@join', [
            'room' => $request->room
        ]);
    }

}
