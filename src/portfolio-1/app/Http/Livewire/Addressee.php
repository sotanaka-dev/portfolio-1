<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Rules\PostalCodeRule;
use App\Rules\TelRule;
use App\Models\Addressee as AddresseeModel;

class Addressee extends Component
{
    public $addressee;
    public $edit_open = false;

    protected $listeners = [
        'refresh'   => '$refresh',
        'resetForm' => 'resetForm',
    ];

    public function mount()
    {
        $this->name        = $this->addressee->name;
        $this->postal_code = $this->addressee->postal_code;
        $this->address     = $this->addressee->address;
        $this->tel         = $this->addressee->tel;
        $this->is_default  = $this->addressee->is_default;
    }

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
        return view('livewire.addressee');
    }

    public function editAddressee()
    {
        $validated_data = $this->validate();
        $this->dispatchBrowserEvent('before-validation');

        if ($this->is_default) {
            AddresseeModel
                ::where('user_id', Auth::id())
                ->where('id', '<>', $this->addressee->id)
                ->update(['is_default' => false]);
        }

        $this->addressee->fill($validated_data)->save();

        $this->emit('resetForm');
        $this->dispatchBrowserEvent('flash', ['message' => __('messages.complete.edit_addressee')]);
    }

    public function resetForm()
    {
        $this->edit_open = false;
        $this->resetValidation();
        $this->mount();
    }

    private function removeAddressee()
    {
        $this->dispatchBrowserEvent('addressee-removed');

        AddresseeModel::find($this->addressee->id)->delete();
        $this->addressee = AddresseeModel::make();

        $this->emit('resetForm');
        $this->dispatchBrowserEvent('flash', ['message' => __('messages.complete.remove_addressee')]);
    }

    public function pressedExecBtn()
    {
        $this->removeAddressee();
    }
}
