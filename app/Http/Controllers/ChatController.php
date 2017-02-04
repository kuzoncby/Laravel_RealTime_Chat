<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * All rooms belongs to that user.
     * @param Request $request
     * @return collection
     */
    public function rooms(Request $request)
    {
        $user = $this->user($request);
        $rooms = $user->rooms()->get();
        return $rooms;
    }

    /**
     * Who authenticated
     * @param Request $request
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user(Request $request)
    {
        if (Auth::user()) {
            $user = Auth::user();
        } else {
            $user = User::where('email', $request->email)->first();
        }
        return $user;
    }
}
