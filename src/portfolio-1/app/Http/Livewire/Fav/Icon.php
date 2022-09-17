<?php

namespace App\Http\Livewire\Fav;

use Livewire\Component;

class Icon extends Component
{
    public $product;
    public $fav_item;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount()
    {
        $this->fav_item = collect([
            'id'   => $this->product->id,
            'name' => $this->product->name,
            'path' => $this->product->path,
        ]);
    }

    public function render()
    {
        return view('livewire.fav.icon');
    }
}
