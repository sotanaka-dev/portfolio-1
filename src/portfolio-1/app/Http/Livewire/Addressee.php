<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Addressee as AddresseeModel;

class Addressee extends Component
{
    use Trait\EditAddressee;

    public $addressee;

    public function render()
    {
        return view('livewire.addressee');
    }

    private function removeAddressee()
    {
        $this->dispatchBrowserEvent('addressee-removed');

        AddresseeModel::find($this->addressee->id)->delete();

        $this->emitTo('addressees', 'refresh');
        $this->dispatchBrowserEvent('flash', ['message' => __('messages.complete.remove_addressee')]);
    }

    public function pressedExecBtn()
    {
        $this->removeAddressee();
    }
}
