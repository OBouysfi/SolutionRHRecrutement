<?php

namespace App\Http\Controllers\Web\ChatVisio;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Events\WebRTCOffer;
use App\Events\WebRTCAnswer;
use App\Events\ICECandidate;
use App\Events\CallEnded;
use App\Models\User;

class VideoCallController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        $token = Auth::user()->createToken('EchoToken')->plainTextToken;
        return view('chat_visio.visio', compact('users', 'token'));
    }

    public function signalOffer(Request $request)
    {
        $request->validate([
            'offer' => 'required',
            'to' => 'required|exists:users,id'
        ]);

        broadcast(new WebRTCOffer(
            auth()->id(),
            $request->to,
            $request->offer
        ));

        return response()->json(['status' => 'Offer sent']);
    }

    public function signalAnswer(Request $request)
    {
        $request->validate([
            'answer' => 'required',
            'to' => 'required|exists:users,id'
        ]);

        broadcast(new WebRTCAnswer(
            auth()->id(),
            $request->to,
            $request->answer
        ));

        return response()->json(['status' => 'Answer sent']);
    }

    public function signalIceCandidate(Request $request)
    {
        $request->validate([
            'candidate' => 'required',
            'to' => 'required|exists:users,id'
        ]);

        broadcast(new ICECandidate(
            auth()->id(),
            $request->to,
            $request->candidate
        ));

        return response()->json(['status' => 'ICE candidate sent']);
    }

    public function endCall(Request $request)
    {
        $request->validate([
            'to' => 'required|exists:users,id'
        ]);

        broadcast(new CallEnded(
            auth()->id(),
            $request->to
        ));

        return response()->json(['status' => 'Call ended']);
    }
}