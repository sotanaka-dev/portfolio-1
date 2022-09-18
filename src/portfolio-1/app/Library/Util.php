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
    public static function addHyphenToPostalCode($input)
    {
        $replaced_value = str_replace("-", "", $input);
        return substr($replaced_value, 0, 3) . "-" . substr($replaced_value, 3);
    }

    /* ユーザーが入力した電話番号にハイフンを付与する */
    public static function addHyphenToTel($input)
    {
        $replaced_value = str_replace("-", "", $input);

        $category = [
            "normal" => "/^0[^346]\d{8}$/",
            "mobile" => "/^\d{11}$/",
            "tokyo"  => "/^0[346]\d{7}$/",
            "none"   => "/^\d{7}$/",
        ];
        $pattern = [
            "normal" => "/(\d{3})(\d{3})(\d{4})/",
            "mobile" => "/(\d{3})(\d{4})(\d{4})/",
            "tokyo"  => "/(\d{2})(\d{3})(\d{4})/",
            "none"   => "/(\d{3})(\d{4})/",
        ];
        $rep = [
            "normal" => "$1-$2-$3",
            "none"   => "$1-$2",
        ];

        // 携帯
        if (preg_match($category['mobile'], $replaced_value)) {
            return preg_replace($pattern['mobile'], $rep['normal'], $replaced_value);
        }
        // 市外局番2桁
        if (preg_match($category['tokyo'], $replaced_value)) {
            return preg_replace($pattern['tokyo'], $rep['normal'], $replaced_value);
        }
        // 普通の市外局番
        if (preg_match($category['normal'], $replaced_value)) {
            return preg_replace($pattern['normal'], $rep['normal'], $replaced_value);
        }
        // 市外局番なし
        if (preg_match($category['none'], $replaced_value)) {
            return preg_replace($pattern['none'], $rep['none'], $replaced_value);
        }
        // その他
        return $replaced_value;
    }
}
