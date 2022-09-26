<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TotalAmountInCart extends Component
{
    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render()
    {
        return view(
            'livewire.total-amount-in-cart',
            ['items' => \Util::getItemsInTheSession()]
        );
    }
}
