<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ICECandidate implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $candidate;
    public $from;
    public $to;

    public function __construct($from, $to, $candidate)
    {
        $this->from = $from;
        $this->to = $to;
        $this->candidate = $candidate;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('video-call.' . $this->to);
    }

    public function broadcastWith()
    {
        return [
            'candidate' => $this->candidate,
            'from' => $this->from,
            'to' => $this->to
        ];
    }
}