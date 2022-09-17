<?php

namespace App\Listeners;

use App\Events\Order as OrderEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\Order as OrderMail;
use Illuminate\Support\Facades\Mail;

class SendOrderNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Order  $event
     * @return void
     */
    public function handle(OrderEvents $event)
    {
        $user = $event->user;
        $items = $event->items;
        $payment = $event->payment;

        Mail::to($user)
            ->send(new OrderMail($user, $items, $payment));
    }
}
