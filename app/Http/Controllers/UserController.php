<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;

use Carbon\Carbon;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user online status.
     */
    public function usersWithStatus()
    {
        $users = User::all();

        $onlineUsers = [];

        $offlineUsers = [];

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
               $onlineUsers[] = $user;
            else
                $offlineUsers[] = $user;
        }

        return [
            'online' => $onlineUsers,
            'offline' => $offlineUsers,
        ];
    }

    public function index(){
        return view('user.index', [
            'users' => $this->usersWithStatus()
        ]);
    }
}
