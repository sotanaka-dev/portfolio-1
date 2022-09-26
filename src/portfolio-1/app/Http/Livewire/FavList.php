<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FavList extends Component
{
    public $fav_items;

    public function mount()
    {
        $this->fav_items = [];
    }

    public function render()
    {
        return view('livewire.fav-list')
            ->extends('layouts.template')
            ->section('content');
    }
}
