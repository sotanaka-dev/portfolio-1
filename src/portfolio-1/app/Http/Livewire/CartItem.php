<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartItem extends Component
{
    private const LOWER_LIMIT_OF_SPIN_BTN = 1;
    public $item;

    public function mount()
    {
        $this->qty   = $this->item['qty'];
        $this->stock = $this->item['stock'];
    }

    public function render()
    {
        $this->emitTo('components.total-amount-in-cart', 'refresh');
        $this->emitTo('components.qty-in-cart', 'refresh');

        return view('livewire.cart-item');
    }

    /* TODO: リファクタリングしたい */
    public function updatedQty()
    {
        if ($this->qty === '') {
            $this->qty = self::LOWER_LIMIT_OF_SPIN_BTN;
        }

        if ($this->qty > $this->stock) {
            $this->qty = $this->stock;
        }

        if ($this->qty < self::LOWER_LIMIT_OF_SPIN_BTN) {
            $this->removeItem();
            return;
        }

        $this->updateQtyOfItemsInSession();
    }

    private function updateQtyOfItemsInSession()
    {
        $items = \Util::getItemsInTheSession()->toArray();
        $items[$this->item['id']]['qty'] = $this->qty;

        session()->put('items', collect($items));
    }

    public function removeItem()
    {
        $items = \Util::getItemsInTheSession();
        $items->forget($this->item['id']);

        if ($items->isEmpty()) {
            session()->forget('items');
        }

        $this->emitTo('cart', 'refresh');
    }
}
