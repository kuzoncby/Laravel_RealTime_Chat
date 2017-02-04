<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Who own this message
     */
    public function user()
    {
        $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * Which room own this message
     */
    public function room()
    {
        $this->belongsTo('App\Room', 'room_id', 'id');
    }
}
