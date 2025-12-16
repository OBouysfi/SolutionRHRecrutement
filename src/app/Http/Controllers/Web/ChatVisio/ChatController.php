<?php

namespace App\Http\Controllers\Web\ChatVisio;

use App\Http\Controllers\Controller;
use Illuminate\Mail\Events\MessageSent;
use Request;

class ChatController extends Controller
{

    public function index()
    {
        return view('chat_visio.visio');
    }
    public function sendMessage(Request $request)
        {
            $message = $request->input('message');
            broadcast(new MessageSent(auth()->user(), $message))->toOthers();
            return ['status' => 'Message broadcasté'];
        }
}

