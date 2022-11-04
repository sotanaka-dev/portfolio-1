<?php

/* 呼び出し元の商品をお気に入り（ローカルストレージ）に追加・削除する為のアイコンの表示 */

namespace App\Http\Livewire;

use Livewire\Component;

class FavIcon extends Component
{
    public $product;
    public $fav_item;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount()
    {
        /* NOTE: blade内でローカルストレージに追加する際にJSON形式へ変換するため、コレクションとして扱う */
        $this->fav_item = collect([
            'id'   => $this->product->id,
            'name' => $this->product->name,
            'path' => $this->product->path,
        ]);
    }

    public function render()
    {
        return view('livewire.fav-icon');
    }
}
