<?php

/* 自作したビューコンポーザの登録 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Http\Composers\StockStatusComposer;
use App\Http\Composers\AmountComposer;
use App\Http\Composers\ProductsCategoryComposer;

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
        View::composer('components.header', ProductsCategoryComposer::class);
        View::composer('livewire.product-detail', StockStatusComposer::class);
        View::composer([
            'livewire.total-amount-in-cart',
            'livewire.order',
            'emails.order',
        ], AmountComposer::class);
    }
}
