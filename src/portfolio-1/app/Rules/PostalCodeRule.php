<?php

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
        // 半角数字のみ ハイフン無しもOK
        if (!preg_match("/\A\d{3}-?\d{4}\z/", $value)) {
            $fail(__('validation.postal_code'));
        }

        // 半角数字のみ ハイフン有りのみ
        // return preg_match('/\A\d{3}[-]\d{4}\z/', $value);

    }
}
