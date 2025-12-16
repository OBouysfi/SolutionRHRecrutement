<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WebRTCOffer implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $offer;
    public $from;
    public $to;

    public function __construct($from, $to, $offer)
    {
        $this->from = $from;
        $this->to = $to;
        $this->offer = $offer;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('video-call.' . $this->to);
    }

    public function broadcastWith()
    {
        return [
            'offer' => $this->offer,
            'from' => $this->from,
            'to' => $this->to
        ];
    }
}