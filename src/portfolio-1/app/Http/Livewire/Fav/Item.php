<?php

namespace App\Http\Livewire\Fav;

use Livewire\Component;

class Item extends Component
{
    public $fav_item;

    public function render()
    {
        return view('livewire.fav.item');
    }
}
