<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        }else{
            Session::flash('message', '
                Swal.fire(
                    "Humb?",
                    "The detail version is not available",
                    "warning"
                )
            ');
            return redirect()->back();
        }

        $this->commingSoon();
    }
}
