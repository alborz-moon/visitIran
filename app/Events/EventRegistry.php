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
    public $eventName;
    public $paid;
    public $createdAt;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($phone, $mail, $eventName, $paid, $createdAt)
    {
        $this->phone = $phone;
        $this->mail = $mail;
        $this->eventName = $eventName;
        $this->paid = $paid;
        $this->createdAt = $createdAt;
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
