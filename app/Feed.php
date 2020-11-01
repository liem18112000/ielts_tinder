<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Feed extends Model
{
    protected $guarded = [];

    //Show user that created a feed.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function decrypt($encryptString)
    {
        try {
            return Crypt::decryptString($encryptString);
        } catch (DecryptException $e) {
            //
        }
    }
}
