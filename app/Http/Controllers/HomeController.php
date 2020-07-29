<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use MacsiDigital\Zoom\Facades\Zoom;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }

    public function index()
    {
        return view('index');
    }

    public function aboutYourself()
    {
        return view('about-yourself');
    }

    public function aboutPartner()
    {
        return view('about-partner');
    }

    public function signInSignUp()
    {
        return view('signin-signup');
    }

    public function search()
    {
        return view('search');
    }
}
