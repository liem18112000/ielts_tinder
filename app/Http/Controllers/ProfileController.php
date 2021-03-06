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
    public function show($user_id)
    {

        if(!Profile::where('user_id', $user_id)->exists()){

            $user = User::find($user_id);

            $profile = Profile::create([
                'user_id'       => $user->id,
                'name'          => $user->name
            ]);

        }

        // Check profile belogn to user or not
        if(Auth::user()->id == $user_id){

            // Return private profile
            return view('profile.show', [
                'profile' => Profile::where('user_id', $user_id)->firstOrFail(),
            ]);
        }

        // Return public profile
        return view('profile.public', [
            'profile' => Profile::where('user_id', $user_id)->firstOrFail(),
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
