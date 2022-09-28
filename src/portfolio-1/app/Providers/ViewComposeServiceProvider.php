<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('livewire.product-detail', 'App\Http\Composers\StockStatusComposer');
        View::composer('livewire.total-amount-in-cart', 'App\Http\Composers\AmountComposer');
        View::composer('livewire.order', 'App\Http\Composers\AmountComposer');
        View::composer('emails.order', 'App\Http\Composers\AmountComposer');
    }
}
