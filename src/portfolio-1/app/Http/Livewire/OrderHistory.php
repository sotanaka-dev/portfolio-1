<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderHistory extends Component
{
    public $products;
    public $interval;
    public $years;

    public function mount()
    {
        $this->setYears();
        $this->setProducts();
    }

    public function render()
    {
        return view('livewire.order-history')
            ->extends('layouts.template')
            ->section('content');
    }

    private function setYears()
    {
        $this->years =
            DB::table('order_details')
            ->selectRaw('DISTINCT(DATE_FORMAT(created_at,"%Y")) AS year')
            ->orderBy('year', 'desc')
            ->pluck('year');
    }

    private function setProducts()
    {
        $this->products =
            DB::table('order_details as od')
            ->select('od.order_id', 'od.created_at', 'od.quantity', 'p.id', 'p.path', 'p.name', 'p.price')
            ->join('products as p', 'od.product_id', '=', 'p.id')
            ->whereIn('od.order_id', function ($query) {
                $query
                    ->select('id')
                    ->from('orders')
                    ->where('user_id', '=', Auth::id());
            })
            ->when($this->interval, function ($query, $interval) {
                return $query
                    ->whereRaw(
                        'DATE_FORMAT(od.created_at, "%Y") = ?',
                        [$interval]
                    );
            })
            ->orderBy('od.created_at', 'desc')
            ->get();
    }
}







/*
Eloquent
なぜか非同期後のSQLがエラーになる
モデルクラスにプロパティやリレーションに関する記述が不足しているのかもしれない

use App\Models\OrderDetail;

$this->years =
    OrderDetail
    ::selectRaw('DISTINCT(DATE_FORMAT(created_at,"%Y")) AS year')
    ->orderBy('year', 'desc')
    ->pluck('year');

$this->products =
    OrderDetail::from('order_details as od')
    ->select('od.order_id', 'od.created_at', 'od.quantity', 'p.id', 'p.path', 'p.name', 'p.price')
    ->join('products as p', 'od.product_id', '=', 'p.id')
    ->whereIn('od.order_id', function ($query) {
        $query
            ->select('id')
            ->from('orders')
            ->where('user_id', '=', Auth::id());
    })
    ->when($this->interval, function ($query, $interval) {
        return $query
            ->whereRaw(
                'DATE_FORMAT(od.created_at, "%Y") = ?',
                [$interval]
            );
    })
    ->orderBy('od.created_at', 'desc')
    ->get();
*/


/*
SQL

$this->years = DB::select(
    'SELECT
        DISTINCT(DATE_FORMAT(created_at,"%Y")) AS year
    FROM
        order_details
    ORDER BY
        year DESC'
);

$this->products = DB::select(
    'SELECT
        od.created_at, od.quantity, p.id, p.path, p.name
    FROM
        order_details AS od
    JOIN
        products AS p
    ON
        od.product_id = p.id
    WHERE
        order_id IN (
            SELECT id
            FROM orders
            WHERE user_id = :user_id
        )
        AND
            CASE :interval_1
                WHEN "all" THEN "" = ""
                ELSE DATE_FORMAT(od.created_at, "%Y") = :interval_2
            END
    ORDER BY
        od.created_at DESC',
    [
        'user_id' => Auth::id(),
        'interval_1' => $this->interval,
        'interval_2' => $this->interval
    ]
);
*/
