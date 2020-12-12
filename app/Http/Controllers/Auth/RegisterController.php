<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\Welcome;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Profile;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'min:8'],
            'email' => ['required', 'string', 'email','min:8', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            $allMessages = '';
            foreach($errors->getMessages() as $messages){
                foreach($messages as $message){
                    $allMessages .= $message . '\n';
                }
            }
            Session::flash(
                'message',
                "Swal.fire(
                    'Register failed!',
                    '$allMessages',
                    'warning'
                )"
            );
        }

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 1,
        ]);

        activity()
            ->performedOn($user)
            ->causedBy($user)
            ->log('New user created');

        $profile = Profile::create([
            'user_id'       => $user->id,
            'name'          => $user->name
        ]);

        activity()
            ->performedOn($profile)
            ->causedBy($user)
            ->log('New profile created');

        Session::flash(
            'message',
            "Swal.fire(
                'Register success!',
                'Welcome to Ielts Tinder!',
                'success'
            )"
        );

        //$user->notify(new Welcome);

        return $user;
    }
}
