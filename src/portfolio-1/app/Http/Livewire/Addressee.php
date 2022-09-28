<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Addressee as AddresseeModel;

class Addressee extends Component
{
    public $addressee;

    public function render()
    {
        return view('livewire.addressee');
    }

    private function removeAddressee()
    {
        AddresseeModel::find($this->addressee->id)->delete();

        $this->emitUp('refresh');
        $this->dispatchBrowserEvent('addressee-removed');

        /*
        NOTE:
        親コンポーネントがrefreshされると同時にフラッシュメッセージも一瞬で消えるため、改善するまでコメントアウト
        */
        // session()->flash('status', __('messages.complete.remove_addressee'));
    }

    public function pressedExecBtn()
    {
        $this->removeAddressee();
    }
}
