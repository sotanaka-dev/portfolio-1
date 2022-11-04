<?php

/* 店舗情報表示用ページ */

namespace App\Http\Livewire;

use Livewire\Component;

class Access extends Component
{
    public function render()
    {
        return view('livewire.access')
            ->extends('layouts.template')
            ->section('content');
    }
}
