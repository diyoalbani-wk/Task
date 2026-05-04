<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userprofile extends Model
{
    protected $fillable = [
        'avatar',
        'bio',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('user::class');
    }
}
