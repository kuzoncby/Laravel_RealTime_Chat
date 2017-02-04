<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * User rooms
     */
    public function rooms()
    {
        $this->hasMany('App\Room', 'id', 'user_id', 'user_room');
    }

    /**
     * User messages
     */
    public function messages()
    {
        $this->hasMany('App\Message', 'id', 'user_id');
    }
}
