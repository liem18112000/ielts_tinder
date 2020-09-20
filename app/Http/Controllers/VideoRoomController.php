<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        DB::table('joins')->insert([
            'user_id' => Auth::user()->id,
            'room_id' => Room::where('name', $room)->firstOrFail()->id,
            'open_stamp' => Room::where('name', $room)->firstOrFail()->created_at,
            'created_at' => now(),
            'updated_at' => now()
        ]);

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
            $this->updateRoomStatus($allRooms);
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
                'topic' => isset($request->topic) ? $request->topic : 'Not Available',
                'duration' => '0',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->action('VideoRoomController@join', [
            'room' => $request->room
        ]);
    }

    public function topic()
    {
        return view('room.topic');
    }

    protected function updateRoomStatus($allRoomNames)
    {
        foreach(Room::where('status', '1')->get() as $room)
        {
            $isMatch = false;

            foreach($allRoomNames as $roomName)
            {
                if($room->name == $roomName->uniqueName){
                    $isMatch = true;
                    break;
                }
            }

            if(!$isMatch){
                $room->update([
                    'status'        => 0,
                    'duration'      => Carbon::now()->diffInSeconds(Carbon::parse($room->created_at))
                ]);
            }
        }
    }

    public function matching()
    {
        $users = User::all();

        $onlineUsers = [];

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id) && $user->status == 1)
               $onlineUsers[] = $user;
        }

        return view('room.matching', ['onlineUsers' => $onlineUsers]);
    }
}
