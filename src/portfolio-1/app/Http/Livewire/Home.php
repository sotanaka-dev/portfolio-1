<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', ['user' => Auth::user()])
            ->extends('layouts.template')
            ->section('content');
    }

    public function pressedExecBtn()
    {
        return redirect()->route('withdrawal');
    }
}
