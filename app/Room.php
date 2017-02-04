<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function users()
    {
        $this->belongsToMany('App\User', 'user_id', 'id', 'user_room');
    }

    public function messages()
    {
        $this->hasMany('App\Message', 'id', 'room_id');
    }
}
