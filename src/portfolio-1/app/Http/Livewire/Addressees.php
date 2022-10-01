<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Addressee;

class Addressees extends Component
{
    use Trait\AddAddressee;

    public $addressees;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render()
    {
        $this->addressees = $this->getAddressees();

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
