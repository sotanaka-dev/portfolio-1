<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class StockStatusComposer
{
    private const OUT_OF_STOCK_LINE = 0;
    private const FEW_REMAINING_LINE = 10;

    public function compose(View $view)
    {
        $stock_status = <<<EOD
        <p class="detail__stock-status text-success">
            <i class="fa-solid fa-check"></i>&nbsp;在庫あり
        </p>
        EOD;

        if ($view->stock <= self::FEW_REMAINING_LINE && $view->stock > self::OUT_OF_STOCK_LINE) {
            $stock_status = <<<EOD
            <p class="detail__stock-status text-danger">
                <i class="fa-solid fa-triangle-exclamation"></i>&nbsp;残り{$view->stock}点
            </p>
            EOD;
        }
        if ($view->stock <= self::OUT_OF_STOCK_LINE) {
            $stock_status = <<<EOD
            <p class="detail__stock-status text-danger">
                <i class="fa-solid fa-xmark"></i>&nbsp;在庫なし
            </p>
            EOD;
        }

        $view->with([
            'stock_status' => $stock_status,
        ]);
    }
}
