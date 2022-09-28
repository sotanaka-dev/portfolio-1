<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Rules\PostalCodeRule;
use App\Rules\TelRule;
use App\Models\Addressee;

class AddAddressee extends Component
{
    public $name;
    public $postal_code;
    public $address;
    public $tel;

    protected function rules()
    {
        return [
            'name'        => ['required', 'max:255'],
            'postal_code' => ['required', new PostalCodeRule()],
            'address'     => ['required'],
            'tel'         => ['required', new TelRule()],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedPostalCode()
    {
        $this->postal_code = \Util::addHyphenToPostalCode($this->postal_code);
    }

    public function updatedTel()
    {
        $this->tel = \Util::addHyphenToTel($this->tel);
    }

    public function render()
    {
        return view('livewire.add-addressee')
            ->extends('layouts.template')
            ->section('content');
    }

    public function addAddressee()
    {
        $this->dispatchBrowserEvent('before-validation');

        $validated_data = $this->validate();

        Addressee::create([
            'user_id'     => Auth::id(),
            'name'        => $validated_data['name'],
            'postal_code' => $validated_data['postal_code'],
            'address'     => $validated_data['address'],
            'tel'         => $validated_data['tel'],
        ]);

        session()->flash('status', __('messages.complete.add_addressee'));
        return redirect()->route('settings.addressees');
    }
}
