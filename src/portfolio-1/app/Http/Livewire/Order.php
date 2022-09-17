<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Events\Order as OrderEvent;

class Order extends Component
{
    private const INIT_VALUE = 'クレジットカード';

    public $user;
    public $items;
    public $payment = self::INIT_VALUE;

    public function mount()
    {
        if (session()->missing('items')) {
            return redirect()->route('cart');
        }
        $this->user  = Auth::user();
        $this->items = session('items');
    }

    public function render()
    {
        return view('livewire.order')
            ->extends('layouts.template')
            ->section('content');
    }

    public function complete()
    {
        $this->items = session('items');

        $order_id = $this->getOrderIdAfterInsertOrder();

        $this->insertOrderDetails($order_id);

        OrderEvent::dispatch($this->user, $this->items, $this->payment);

        session()->forget('items');

        return redirect()->route('order.history')
            ->with('status', __('messages.complete.order'));
    }

    private function getOrderIdAfterInsertOrder()
    {
        return
            DB::table('orders')
            ->insertGetId([
                'user_id' => $this->user->id,
                'payment' => $this->payment,
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
