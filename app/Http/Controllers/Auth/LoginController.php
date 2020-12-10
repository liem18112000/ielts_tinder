<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\Welcome;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param $provider
     * @return RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->stateless()->user();

        $user = null;

        if ($providerUser->email != null) {
            $user = User::where('email', $providerUser->email)
            ->where('name', $providerUser->name)
                ->where('provider', $provider)
                ->first();
        } else {
            $user = User::where('name', $providerUser->name)
                ->where('provider', $provider)
                ->first();
        }

        if (!$user) {

            $user = User::create([
                'name'          => $providerUser->name,
                'email'         => $providerUser->email,
                'password'      => Hash::make($providerUser->id),
                'provider'      => $provider,
            ]);

            activity()
            ->performedOn($user)
            ->causedBy($user)
            ->log('New user created with third-party provider : ' . $provider);

            $profile = Profile::create([
                'user_id'       => $user->id,
                'name'          => $user->name
            ]);

            activity()
            ->performedOn($profile)
            ->causedBy($user)
            ->log('New profile created with third-party provider : ' . $provider);

        } else {

            if (!Hash::check($providerUser->id, $user->password)) {
                activity()
                ->performedOn($user)
                ->causedBy($user)
                ->log('Login failed with third-party provider : ' . $provider);
                abort(403);
            }else{
                activity()
                ->performedOn($user)
                ->causedBy($user)
                ->log('Login success with third-party provider : ' . $provider);
            }
        }

        $user->status = 1;
        $user->save();

        Session::flash(
            'message',
            "Swal.fire(
                'Login sucess!',
                'Welcome to Ielts Tinder!',
                'success'
            )"
        );

        Auth::login($user, true);

        $user->notify(new Welcome);

        return redirect($this->redirectTo);
    }

    public function authenticated()
    {
        $user = auth()->user();
        $user->status = 1;
        $user->save();
    }

    public function logout()
    {
        $user = auth()->user();
        $user->status = 0;
        $user->save();
        Auth::logout();
        return redirect('index');
    }
}
