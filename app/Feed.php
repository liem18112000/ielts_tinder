<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $guarded = [];

    //Show user that created a feed.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
