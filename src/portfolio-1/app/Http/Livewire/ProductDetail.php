<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductDetail extends Component
{

    private const INIT_VALUE_OF_SPIN_BTN = 1;
    public $qty = self::INIT_VALUE_OF_SPIN_BTN;

    public function mount(Request $request)
    {
        if (!$request->has('id')) {
            return redirect()->route('products');
        }
        $this->product_id      = $request->get('id');
        $this->product         = $this->getProduct();
        $this->category_name   = $this->getCategoryName();
        $this->stock           = $this->product->stock;
    }

    public function render()
    {
        return view('livewire.product-detail')
            ->extends('layouts.template')
            ->section('content');
    }

    /* TODO: リファクタリングしたい */
    public function updatedQty()
    {
        if ($this->qty < self::INIT_VALUE_OF_SPIN_BTN || $this->qty === '') {
            $this->qty = self::INIT_VALUE_OF_SPIN_BTN;
        }

        if ($this->qty > $this->stock) {
            $this->qty = $this->stock;
        }
    }

    private function getProduct()
    {
        return
            Product
            ::where('id', $this->product_id)
            ->first();
    }

    private function getCategoryName()
    {
        return
            DB::table('categories')
            ->select('name')
            ->where('id', $this->product->category_id)
            ->value('name');
    }

    public function addProductToCart()
    {
        $items = \Util::getItemsInTheSession();

        if ($items->has($this->product_id)) {
            $items = $items->toArray();
            $items[$this->product_id]['qty'] += $this->qty;
            if ($items[$this->product_id]['qty'] > $this->stock) {
                $items[$this->product_id]['qty'] = $this->stock;
            }
        } else {
            $item = $this->product->toArray();
            $item['qty'] = $this->qty;
            $items->put($this->product_id, $item);
        }
        session()->put('items', collect($items));

        $this->dispatchBrowserEvent('request-scroll-up');
        $this->qty = self::INIT_VALUE_OF_SPIN_BTN;
        $this->emitTo('qty-in-cart', 'refresh');
        session()->flash('message', __('messages.complete.add_cart'));
    }
}
