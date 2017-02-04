<?php

namespace App\Http\Controllers;

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
        $rooms = Auth::user()->rooms()->get();
        return $rooms;
    }
}
