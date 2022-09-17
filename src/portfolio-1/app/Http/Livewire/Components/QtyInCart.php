<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Http\Request;

class QtyInCart extends Component
{
    public $qty;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render(Request $request)
    {
        $this->qty = \Util::getItemsInTheSession($request)->sum('qty');

        return view('livewire.components.qty-in-cart');
    }
}
