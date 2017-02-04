<?php

namespace App\Http\Controllers;

use App\Message;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Let client know what they sent
     * @param Request $request
     * @return array
     */
    public function all_in_request(Request $request)
    {
        return $request->all();
    }

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

    /**
     * Get all messages in one room
     * @param Request $request
     * @return mixed
     */
    public function messages(Request $request)
    {
        $room = Room::find($request->room_id)
            ->with('messages')
            ->get();
        return $room;
    }

    public function save_message(Request $request)
    {
        Message::create(
            [
                'message' => $request->message,
                'room_id' => $request->room_id,
                'user_id' => $request->user_id
            ]
        );
    }
}
