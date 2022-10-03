<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Rules\PostalCodeRule;
use App\Rules\TelRule;
use App\Models\Addressee;

class Addressees extends Component
{
    public $addressees;
    public $name;
    public $postal_code;
    public $address;
    public $tel;
    public $is_default = false;
    public $add_open = false;

    protected $listeners = [
        'resetForm' => 'resetForm',
    ];

    protected function rules()
    {
        return [
            'name'        => ['required', 'max:255'],
            'postal_code' => ['required', new PostalCodeRule()],
            'address'     => ['required'],
            'tel'         => ['required', new TelRule()],
            'is_default'  => ['boolean'],
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
        $this->addressees = $this->getAddressees();

        return view('livewire.addressees')
            ->extends('layouts.template')
            ->section('content');
    }

    private function getAddressees()
    {
        $addressees =
            Addressee
            ::where('user_id', '=', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();

        if ($addressees->isNotEmpty() && $addressees->doesntContain('is_default', true)) {
            $addressees->first()->update(['is_default' => true]);

            $this->emitTo('addressee', 'refresh');
        }
        return $addressees;
    }

    public function addAddressee()
    {

        $validated_data = $this->validate();

        $this->dispatchBrowserEvent('before-validation');

        if ($this->is_default) {
            Addressee
                ::where('user_id', Auth::id())
                ->update(['is_default' => false]);
        }

        Addressee::create([
            'user_id'     => Auth::id(),
            'name'        => $validated_data['name'],
            'postal_code' => $validated_data['postal_code'],
            'address'     => $validated_data['address'],
            'tel'         => $validated_data['tel'],
            'is_default'  => $validated_data['is_default'],
        ]);

        $this->emit('resetForm');
        $this->dispatchBrowserEvent('flash', ['message' => __('messages.complete.add_addressee')]);
    }

    public function resetForm()
    {
        $this->add_open = false;
        $this->resetValidation();
        $this->reset(['name', 'postal_code', 'address', 'tel', 'is_default']);
    }
}
