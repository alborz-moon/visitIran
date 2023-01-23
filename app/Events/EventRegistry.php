<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventRegistry
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $phone;
    public $mail;
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($phone, $mail, $data)
    {
        $this->phone = $phone;
        $this->mail = $mail;
        $this->data = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
