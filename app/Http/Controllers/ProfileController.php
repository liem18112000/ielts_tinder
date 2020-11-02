<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Profile;

use App\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\File;

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

        return view('profile.show', [
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
<<<<<<< HEAD
        if ($request->image != "https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png")
        {
            $profile_image = $this->storeMediaCloudinary($request, 'profile_image');
            $profile->update([
                'profile_image' => $profile_image,
            ]);
        }
        
=======
        $profile_image = $this->storeMediaCloudinary($request, 'profile_image');
>>>>>>> 413329ebe477e7b90c4afcc272be2e20ba6b56f0

        $profile->update([
            'name' => $request->name,
            'home' => $request->home,
            'dob' => $request->dob,
            'profile_image' => $profile_image,
            'band_score' => $request->band_score,
            'achieve_time' => $request->achieve_time,
            'intro' => $request->intro,
            'profile_image' => $profile_image  
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
