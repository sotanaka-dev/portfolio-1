<?php

/* 商品の注文処理（DBへのインサート等） */

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Addressee;

use App\Events\Order as OrderEvent;

class Order extends Component
{
    public $items;
    public $addressees;
    public $select_addressee_id;
    public $select_addressee;

    public function mount()
    {
        if (session()->missing('items')) {
            return redirect()->route('cart');
        }

        if (Addressee::where('user_id', '=', Auth::id())->doesntExist()) {
            return redirect()->route('settings.addressees');
        }

        $this->items = session('items');

        $this->addressees = $this->getAddressees();
        $this->select_addressee_id = $this->addressees->first()->id;
        $this->select_addressee = $this->getAddressee();
    }

    public function render()
    {
        return view('livewire.order')
            ->extends('layouts.template')
            ->section('content');
    }

    public function updatedSelectAddresseeId()
    {
        $this->select_addressee = $this->getAddressee();
    }

    private function getAddressees()
    {
        return
            Addressee
            ::where('user_id', '=', Auth::id())
            ->orderBy('is_default', 'desc')
            ->orderBy('created_at', 'asc')
            ->get();
    }

    private function getAddressee()
    {
        return Addressee::where('id', '=', $this->select_addressee_id)->first();
    }

    public function pressedExecBtn()
    {
        $this->complete();
    }

    public function complete()
    {
        $order_id = $this->getOrderIdAfterInsertOrder();
        $this->insertOrderDetails($order_id);

        OrderEvent::dispatch(Auth::user(), $this->select_addressee, $this->items);

        session()->forget('items');

        return redirect()->route('order.history')
            ->with('message', __('messages.complete.order'));
    }

    private function getOrderIdAfterInsertOrder()
    {
        return
            DB::table('orders')
            ->insertGetId([
                'user_id' => Auth::id(),
                'addressee_id' => $this->select_addressee_id,
            ]);
    }

    // FIXME: N+1問題が未解決
    private function insertOrderDetails($order_id)
    {
        foreach ($this->items as $item) {
            DB::table('order_details')
                ->insert([
                    'order_id'   => $order_id,
                    'product_id' => $item['id'],
                    'quantity'   => $item['qty'],
                ]);

            DB::table('products')
                ->where('id', $item['id'])
                ->update([
                    'stock' => $item['stock'] - $item['qty'],
                ]);
        }
    }
}
