<?php

/* 注文処理時に発行されるイベントのリスナ */

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
        $addressee = $event->addressee;
        $items = $event->items;

        Mail::to($user)
            ->send(new OrderMail($user, $addressee, $items));
    }
}
