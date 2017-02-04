<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message', 'room_id', 'user_id'
    ];

    /**
     * Who own this message
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * Which room own this message
     */
    public function room()
    {
        return $this->belongsTo('App\Room', 'room_id', 'id');
    }
}
