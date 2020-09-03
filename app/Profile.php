<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    //Show a user having this profile.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
