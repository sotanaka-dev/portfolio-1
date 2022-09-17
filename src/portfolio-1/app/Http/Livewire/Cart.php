<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render()
    {
        // session()->forget('items');

        return view('livewire.cart', [
            'items' => \Util::getItemsInTheSession()
        ])
            ->extends('layouts.template')
            ->section('content');
    }
}
