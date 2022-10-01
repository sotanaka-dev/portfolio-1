<?php

namespace App\Http\Livewire\Trait;

use App\Rules\PostalCodeRule;
use App\Rules\TelRule;

trait EditAddressee
{
    public function mount()
    {
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

    public function editAddressee()
    {

        $validated_data = $this->validate();

        $this->dispatchBrowserEvent('edited-addressee');
        $this->dispatchBrowserEvent('before-validation');

        $this->addressee->fill($validated_data)->save();

        $this->emitTo('addressees', 'refresh');
        $this->dispatchBrowserEvent('flash', ['message' => __('messages.complete.edit_addressee')]);
    }
}
