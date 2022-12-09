<?php

/* ヘッダーで使用する商品カテゴリーテーブルのレコードをビューに渡す */

namespace App\Http\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProductsCategoryComposer
{
    public function compose(View $view)
    {
        $view->with([
            'categories' => DB::table('categories')->get(),
        ]);
    }
}
