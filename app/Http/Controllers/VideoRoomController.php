<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Notifications\MatchRequest;
use App\Notifications\RefuseMatchRequest;
use App\Jobs\CloseRoomJob;

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

        if(!DB::table('joins')->where('status', 1)->where('user_id', Auth::user()->id)->first()){
            DB::table('joins')->insert([
                'user_id' => Auth::user()->id,
                'room_id' => Room::where('name', $room)->firstOrFail()->id,
                'open_stamp' => Room::where('name', $room)->firstOrFail()->created_at,
                'created_at' => now(),
                'updated_at' => now(),
                'status'    => '1',
            ]);
        }

        Auth::user()->user_status->update([
            'status' => 'in-room'
        ]);

        return view('room.room',[
            'accessToken'   => $token->toJWT(),
            'room'          => $room,
            'identity'      => $identity,
            'remainingTime' => 60 * 60 - (now()->diffInSeconds(Room::where('name', $room)->firstOrFail()->created_at)),
        ]);
    }

    public function endRoom($roomName, $topics = [])
    {
        $client = new Client(config('services.twilio.sid'), config('services.twilio.token'));

        $rooms = $client->video->rooms->read([]);

        foreach ($rooms as $room) {
            if ($room->uniqueName == $roomName) {
                $room->update("completed");
                $ps = $room->participants->read(array("status" => "connected"));;
                foreach ($ps as $participant) {
                    $participant->update(array("status" => "disconnected"));
                }
            }
        }

        DB::table('joins')->where('user_id', Auth::user()->id)->where('room_id', Room::where('name', $roomName)->first()->id)->update([
            'status' => '0',
            'close_stamp' => Carbon::now(),
        ]);

        Auth::user()->user_status->update([
            'status' => 'idle'
        ]);

        Session::flash(
            'message',
            "Swal.fire(
                'Done',
                'You have end your matching!',
                'success'
            )"
        );

        foreach(Room::where('name', $roomName)->get() as $room)
        {
            $room->update([
                'status'        => 0,
                'topic'         => json_encode($topics)
            ]);
        }
        return redirect()->route('room.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
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
        return view('room.index', [
            'rooms' => $allRooms,
            'newRoomName' => 'IELTS_TINDER_' . rand(1000, 9999)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     * @throws ConfigurationException
     * @throws TwilioException
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
            'room' => $request->room,
            'remainingTime' => 60 * 60 - (now()->diffInSeconds(Room::where('name', $request->room)->firstOrFail()->created_at)),
        ]);
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
            if (Cache::has('user-is-online-' . $user->id) && $user->status == 1
                && $user->user_status->status == 'idle' && $user->id != Auth::id())
               $onlineUsers[] = $user;
        }

        return view('room.matching', [
            'onlineUsers' => $onlineUsers,
            'token' => Str::random(20)
        ]);
    }

    public function lounge(User $invite, string $token)
    {
        $invite->notify(new MatchRequest(Auth::user(), $invite, $token));

        activity()
        ->performedOn($invite)
        ->causedBy(Auth::user())
        ->log('Send a match request');

        Session::flash(
            'message',
            "Swal.fire(
                'Invitation sent',
                'Be patient and your speak-mate will arrive in next few seconds!',
                'success'
            )"
        );

        $client = new Client($this->sid, $this->token);

        $exists = $client->video->rooms->read(['uniqueName' => $token]);

        if (empty($exists)) {
            $client->video->rooms->create([
                'uniqueName'                    => $token,
                'type'                          => 'peer-to-peer',
                'recordParticipantsOnConnect'   => true
            ]);

            $room = Room::create([
                'name' => $token,
                'created_at' => now(),
                'status' => 1,
                'topic' => 'Not Available',
                'duration' => '0',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            activity()
            ->performedOn($room)
            ->causedBy(Auth::user())
            ->log('Create new room : '.$token);
        }

        return redirect()->action('VideoRoomController@join', [
            'room' => $token,
            'remainingTime' => 60 * 60 - (now()->diffInSeconds(Room::where('name', $token)->firstOrFail()->created_at)),
        ]);
    }

    public function refuse(User $invitor, string $token)
    {
        $invitor->notify(new RefuseMatchRequest(Auth::user(), $invitor, $token));

        return response()->json([
            'message' => 'notify refuse request'
        ]);

    }

    public function getMatchingRequest(){

        if(Auth::user()->user_status->status == 'idle'){

            $notifications = Auth()->user()->unreadNotifications->where('type', 'App\Notifications\MatchRequest')->all();

            if (count($notifications) == 0) {
                return response()->json([
                    'message' => null
                ]);
            }

            foreach ($notifications as $notification) {
                $notification->markAsRead();
            }

            return response()->json([
                'message' => 'Get all matching request',
                'notifications' => $notifications
            ]);
        }

        return response()->json([
            'message'   => null
        ]);
    }

    public function refuseMatchingRequest(){

        $notifications = Auth()->user()->unreadNotifications->where('type', 'App\Notifications\RefuseMatchRequest')->all();

        if (count($notifications) == 0) {
            return response()->json([
                'message' => null
            ]);
        }

        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }

        return response()->json([
            'message' => 'Get refuse matching request',
            'notifications' => $notifications
        ]);

    }

    public function onRefuse(string $token){

        $client = new Client(config('services.twilio.sid'), config('services.twilio.token'));

        $rooms = $client->video->rooms->read([]);

        foreach ($rooms as $room) {
            if ($room->uniqueName == $token) {
                $room->update("completed");
                $ps = $room->participants->read(array("status" => "connected"));;
                foreach ($ps as $participant) {
                    $participant->update(array("status" => "disconnected"));
                }
            }
        }

        DB::table('joins')->where('user_id', Auth::user()->id)->where('room_id', Room::where('name', $token)->first()->id)->update([
            'status' => '0',
            'close_stamp' => Carbon::now(),
        ]);

        Auth::user()->user_status->update([
            'status' => 'idle'
        ]);

        Session::flash(
            'message',
            "Swal.fire(
                'Opps',
                'Your request has been denied!',
                'error'
            )"
        );

        foreach (Room::where('name', $token)->get() as $room) {
            $room->update([
                'status'        => 0,
            ]);
        }

        return redirect()->route('room.index');

    }

    public function dubbingSongChoosing()
    {
        return view('dubbing.song');
    }

    public function dubbing()
    {
        return view('dubbing.dubbing');
    }
}
