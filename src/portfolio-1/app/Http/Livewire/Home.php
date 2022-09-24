<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home')
            ->extends('layouts.template')
            ->section('content');
    }

    public function pressedExecBtn()
    {
        return redirect()->route('withdrawal');
    }
}
