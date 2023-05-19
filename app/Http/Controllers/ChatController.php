<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageEvent;
use App\Events\HelloEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        // \broadcast(new HelloEvent());
        return view('dashboard.chat.index', [
            'title' => 'ChatApp'
        ]);
    }

    public function store(Request $request)
    {
        \event(new ChatMessageEvent($request->message, auth()->user()));
        return null;
    }
}
