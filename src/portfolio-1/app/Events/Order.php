<?php

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
    public $items;
    public $payment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $items, $payment)
    {
        $this->user = $user;
        $this->items = $items;
        $this->payment = $payment;
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
