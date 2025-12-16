<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->message->company_id);
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->message->id,
            'sender_id' => $this->message->sender_id,
            'sender_name' => optional($this->message->sender)->name ?? 'Utilisateur inconnu',
            'receiver_id' => $this->message->receiver_id,
            'receiver_name' => optional($this->message->receiver)->name ?? 'Utilisateur inconnu',
            'company_id' => $this->message->company_id,
            'message' => $this->message->message,
            'created_at' => $this->message->created_at->format('H:i'),
        ];
    }

}