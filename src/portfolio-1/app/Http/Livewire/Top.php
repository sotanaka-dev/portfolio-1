<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Top extends Component
{
    private const MAX_DISPLAY_NUM = 8;

    public function render()
    {
        return view(
            'livewire.top',
            ['products' => $this->getLatestProducts(),]
        )
            ->extends('layouts.template')
            ->section('content');
    }

    private function getLatestProducts()
    {
        return Product::latest()
            ->take(self::MAX_DISPLAY_NUM)
            ->get();
    }
}