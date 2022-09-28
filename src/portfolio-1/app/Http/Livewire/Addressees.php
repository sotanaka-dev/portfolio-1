<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Addressee;

class Addressees extends Component
{
    public $addressees;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount()
    {
        $this->addressees = $this->getAddressees();
    }

    public function render()
    {
        return view('livewire.addressees')
            ->extends('layouts.template')
            ->section('content');
    }

    private function getAddressees()
    {
        return
            Addressee::where('user_id', '=', Auth::id())->get();
    }
}
