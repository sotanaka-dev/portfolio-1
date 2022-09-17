<?php

namespace App\Http\Livewire\Fav;

use Livewire\Component;

class ItemList extends Component
{
    public $fav_items;

    public function mount()
    {
        $this->fav_items = [];
    }

    public function render()
    {
        return view('livewire.fav.item-list')
            ->extends('layouts.template')
            ->section('content');
    }
}
