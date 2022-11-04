<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Listeners\SendRegisterNotification;
use App\Events\Order;
use App\Listeners\SendOrderNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,

            /*
            FIXME:
                ここで下記のリスナを呼び出すと認証が完了する前に会員登録完了メールが送信されてしまうため、認証の完了時にイベントを発行したいが、会員登録後の認証とログイン中のメアド変更時の認証は同じプロセスを踏むため、それぞれを判別してイベントを発行させるように改良する必要がある
            */
            // SendRegisterNotification::class,
        ],
        Order::class => [
            SendOrderNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
