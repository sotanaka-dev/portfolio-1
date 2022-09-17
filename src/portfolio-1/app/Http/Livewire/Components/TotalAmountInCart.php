<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class TotalAmountInCart extends Component
{
    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render()
    {
        return view(
            'livewire.components.total-amount-in-cart',
            ['items' => \Util::getItemsInTheSession()]
        );
    }
}
