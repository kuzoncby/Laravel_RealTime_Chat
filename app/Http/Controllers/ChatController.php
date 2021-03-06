<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\MessageReceived;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    /**
     * rooms page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function chat_rooms(Request $request)
    {
        $request->room_id = 1;
        $friends = $this->save_message($request);
        return view('chat.rooms', compact('friends'));
    }

    public function save_message(Request $request)
    {
//        Message::create(
//            [
//                'message' => $request->message,
//                'room_id' => $request->room_id,
//                'user_id' => $request->user_id
//            ]
//        );

        $room_users = Room::find($request->room_id)->with('users')->first();

        foreach ($room_users->users as $user) {
//            $user->notify(new MessageReceived($user));
            event(new MessageReceived($user));
        }
        return $room_users->users;
    }

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
}
