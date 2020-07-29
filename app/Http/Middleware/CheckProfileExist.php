<?php

namespace App\Http\Middleware;

use Closure;

use App\Profile;

use Illuminate\Support\Facades\Session;

class CheckProfileExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!isset($request->profile)) {
            return $next($request);
        }

        if (!Profile::where('user_id', $request->user()->id)->exists()) {
            return redirect(route('profile.create'));
        }

        $profile = Profile::where('user_id', $request->user()->id)->first();

        if (!is_object($request->profile)) {
            if ($profile->id != $request->profile) {
                Session::flash(
                    'message',
                    "Swal.fire(
                        'Access denied!',
                        'It is not your profile',
                        'warning'
                    )"
                );
                return redirect(route('home'));
            }
        } else {
            if ($profile->id != $request->profile->id) {
                Session::flash(
                    'message',
                    "Swal.fire(
                        'Access denied!',
                        'It is not your profile',
                        'warning'
                    )"
                );
                return redirect(route('home'));
            }
        }


        return $next($request);
    }
}
