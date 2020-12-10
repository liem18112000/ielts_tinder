<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('notification.index', [
            'notifications' => Auth::user()->notifications
        ]);
    }

    public function show($notification_id)
    {
        $notification = null;
        if (isset(Auth::user()->notifications)) {
            $notification = Auth::user()->notifications->find($notification_id);
        }

        return $notification->toMail();
    }
}
