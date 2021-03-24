<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Show profile of a user.
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    //Show feeds of a user.
    public function feeds()
    {
        return $this->hasMany(Feed::class);
    }

    //Show list of rooms containing a user.
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'joins');
    }

    //Show list of tests done by a user.
    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    //Show list of tests to mark for an examiner.
    public function testsToMark()
    {
        return $this->hasMany(Test::class, 'examiner');
    }

    public function user_status()
    {
        return $this->hasOne(UserStatus::class);
    }
}
