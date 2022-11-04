<?php

/* 注文処理時に発行するイベント */

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Order
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $addressee;
    public $items;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $addressee, $items)
    {
        $this->user = $user;
        $this->addressee = $addressee;
        $this->items = $items;
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
