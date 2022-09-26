<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FavItem extends Component
{
    public $fav_item;

    public function render()
    {
        return view('livewire.fav-item');
    }
}
