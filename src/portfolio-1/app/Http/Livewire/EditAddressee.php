<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Rules\PostalCodeRule;
use App\Rules\TelRule;
use App\Models\Addressee;
use Illuminate\Http\Request;

class EditAddressee extends Component
{
    public function mount(Request $request)
    {
        $this->addressee   = $this->getAddressee($request->id);
        $this->name        = $this->addressee->name;
        $this->postal_code = $this->addressee->postal_code;
        $this->address     = $this->addressee->address;
        $this->tel         = $this->addressee->tel;
    }

    protected function rules()
    {
        return [
            'name'        => ['required', 'max:255'],
            'postal_code' => ['required', new PostalCodeRule()],
            'address'     => ['required'],
            'tel'         => ['required', new TelRule()],
        ];
    }

    public function updated($property_name)
    {
        $this->validateOnly($property_name);
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
        return view('livewire.edit-addressee')
            ->extends('layouts.template')
            ->section('content');;
    }

    private function getAddressee($id)
    {
        return
            Addressee::where('id', '=', $id)->first();
    }

    public function editAddressee()
    {
        $this->dispatchBrowserEvent('before-validation');

        $validated_data = $this->validate();

        $this->addressee->fill($validated_data)->save();

        session()->flash('status', __('messages.complete.edit_addressee'));
        return redirect()->route('settings.addressees');
    }
}
