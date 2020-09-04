<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];
    
    //Show list of users in a room
    public function users()
    {
        return $this->belongsToMany(User::class, 'joins');
    }

    //Show list of tests happened in a room
    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
