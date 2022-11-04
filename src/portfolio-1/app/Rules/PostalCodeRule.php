<?php

/* 郵便番号のバリデーションルール */

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class PostalCodeRule implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        /* NOTE: ハイフンが含まれていれば除去し、7桁の半角数字かを確認 */

        $replaced_value = str_replace("-", "", $value);

        if (!preg_match("/^\d{7}$/", $replaced_value)) {
            $fail(__('validation.postal_code'));
        }

        // 半角数字のみ ハイフン無しもOK
        // !preg_match("/\A\d{3}-?\d{4}\z/", $value)

        // 半角数字のみ ハイフン有りのみ
        // return preg_match('/\A\d{3}[-]\d{4}\z/', $value);

    }
}
