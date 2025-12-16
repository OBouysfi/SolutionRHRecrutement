<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WebRTCAnswer implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $answer;
    public $from;
    public $to;

    public function __construct($from, $to, $answer)
    {
        $this->from = $from;
        $this->to = $to;
        $this->answer = $answer;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('video-call.' . $this->to);
    }

    public function broadcastWith()
    {
        return [
            'answer' => $this->answer,
            'from' => $this->from,
            'to' => $this->to
        ];
    }
}