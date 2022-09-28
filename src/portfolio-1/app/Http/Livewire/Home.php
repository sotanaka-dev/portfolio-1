<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Addressee;

class Home extends Component
{
    public $addressee_not_exist = false;

    public function mount()
    {
        if (Addressee::where('user_id', '=', Auth::id())->doesntExist()) {
            $this->addressee_not_exist = true;
        }
    }

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
