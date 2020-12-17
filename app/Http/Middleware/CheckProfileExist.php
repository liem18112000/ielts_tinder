<?php

namespace App\Http\Middleware;

use Closure;

use App\Profile;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

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
            $user = Auth::user();
            $profile = Profile::create([
                'user_id'       => $user->id,
                'name'          => $user->name
            ]);

            activity()
            ->performedOn($profile)
            ->causedBy($user)
            ->log('New profile created');

            return redirect()->route('profile.show', $profile);
        }

        return $next($request);
    }
}
