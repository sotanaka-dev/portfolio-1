<?php

namespace App\Library;

use Illuminate\Support\Facades\Facade;

class Util extends Facade
{
    // \Util::method();

    /* セッションからカートに追加したアイテムを返す */
    public static function getItemsInTheSession()
    {
        $items = collect();
        if (session()->has('items')) {
            $items = session()->get('items');
        }
        return $items;
    }

    /* 直前のurlから末尾のルート名を取得 */
    public static function getRouteNameFromLastUrl()
    {
        $exploded_url = explode('/', url()->previous());
        return end($exploded_url);
    }


    /* ユーザーが入力した郵便番号にハイフンを付与する */
    public static function grantHyphen($postal_code)
    {
        $postal_code = str_replace("-", "", $postal_code);
        $postal_code = substr($postal_code, 0, 3) . "-" . substr($postal_code, 3);
        return $postal_code;
    }
}
