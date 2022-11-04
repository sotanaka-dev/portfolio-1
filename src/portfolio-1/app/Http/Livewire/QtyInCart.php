<?php

/* カート内アイテム（セッション）の数量表示 */

namespace App\Http\Livewire;

use Livewire\Component;

class QtyInCart extends Component
{
    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render()
    {
        return view(
            'livewire.qty-in-cart',
            ['qty' => \Util::getItemsInTheSession()->sum('qty')]
        );
    }
}
