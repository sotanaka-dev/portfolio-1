<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QtyInFavList extends Component
{
    public $qty = 0;

    /* NOTE: entangleを使っているコンポーネント？からは何故かrefreshを使う事ができない */
    protected $listeners = [
        'increment' => 'increment',
        'decrement' => 'decrement',
    ];

    public function render()
    {
        return view('livewire.qty-in-fav-list');
    }

    public function increment()
    {
        $this->qty++;
    }

    public function decrement()
    {
        $this->qty--;
    }
}
