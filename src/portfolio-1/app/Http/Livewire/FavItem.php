<?php

/* お気に入り一覧の各アイテムの表示、削除 */

namespace App\Http\Livewire;

use Livewire\Component;

class FavItem extends Component
{
    public $fav_item;

    public function render()
    {
        return view('livewire.fav-item');
    }
}
