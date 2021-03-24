<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Profile;

use App\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

	// Create a validator for the profile fields
	

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Profile::create($request->all());
        return redirect(route('profile.show', Auth::user()->profile->id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($profile)
    {

        if(!Profile::where('id', $profile)->exists()){

            Profile::create([
                'user_id'       => Auth::user()->id,
                'name'          => Auth::user()->name
            ]);

        }

        // Check profile belong to user or not
        if(Auth::user()->id == Profile::where('id', $profile)->first()->user->id){

            // Return private profile
            return view('profile.show', [
                'profile' => Profile::where('id', $profile)->first(),
            ]);
        }

        // Return public profile
        return view('profile.public', [
            'profile' => Profile::where('id', $profile)->first(),
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit', [
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $profile_image = $this->storeMediaCloudinary($request, 'profile_image');

        $profile->update([
            'name' => $request->name,
            'home' => $request->home,
            'dob' => $request->dob,
            'profile_image' => $profile_image,
            'band_score' => $request->band_score,
            'achieve_time' => $request->achieve_time,
            'intro' => $request->intro
        ]);

        Session::flash(
            'message',
            "Swal.fire(
                'Update sucess!',
                'It is look great!',
                'success'
            )"
        );

        return redirect(route('profile.show', Auth::user()->profile->id));
    }
}
