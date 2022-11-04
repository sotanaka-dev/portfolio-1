<?php

/* ローカルストレージから取得したお気に入りを一覧表示 */

namespace App\Http\Livewire;

use Livewire\Component;

class FavList extends Component
{
    public $fav_items;

    public function mount()
    {
        /* NOTE: ローカルストレージの値がプロパティにセットされる前に配列の初期化をしていないとエラーになる */
        $this->fav_items = [];
    }

    public function render()
    {
        return view('livewire.fav-list')
            ->extends('layouts.template')
            ->section('content');
    }
}
