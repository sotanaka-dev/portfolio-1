<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class TelRule implements InvokableRule
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
        /* NOTE: ハイフンが含まれていれば除去し、10桁か11桁の半角数字かを確認 */

        $replaced_value = str_replace("-", "", $value);

        if (!preg_match("/^0[0-9]{9,10}$/", $replaced_value)) {
            $fail(__('validation.tel'));
        }
    }
}
