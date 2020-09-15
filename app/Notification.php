<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];

    //Show sender of a notification
    public function sender()
    {
        return $this->belongsTo(User::class);
    }

    //Show receiver of a notification.
    public function receiver()
    {
        return $this->belongsTo(User::class);
    }
}
