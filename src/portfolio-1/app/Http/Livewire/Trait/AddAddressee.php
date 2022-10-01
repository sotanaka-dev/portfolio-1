<?php

namespace App\Http\Livewire\Trait;

use Illuminate\Support\Facades\Auth;
use App\Rules\PostalCodeRule;
use App\Rules\TelRule;
use App\Models\Addressee;

trait AddAddressee
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

    public function addAddressee()
    {

        $validated_data = $this->validate();

        $this->dispatchBrowserEvent('added-addressee');
        $this->dispatchBrowserEvent('before-validation');

        Addressee::create([
            'user_id'     => Auth::id(),
            'name'        => $validated_data['name'],
            'postal_code' => $validated_data['postal_code'],
            'address'     => $validated_data['address'],
            'tel'         => $validated_data['tel'],
        ]);

        $this->reset(['name', 'postal_code', 'address', 'tel']);
        $this->emitTo('addressees', 'refresh');
        $this->dispatchBrowserEvent('flash', ['message' => __('messages.complete.add_addressee')]);
    }
}
