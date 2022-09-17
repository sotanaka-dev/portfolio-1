<div class="cart__total-amount-wrap">
    <div class="cart__total-amount">
        <span wire:loading.remove>
            合計&nbsp;&yen;{{ number_format($total_amount) }}&nbsp;&#40;税込&#41;
        </span>

        <span wire:loading>
            calculation...<i class="fa-solid fa-spinner fa-spin fa-sm"></i>
        </span>
    </div>
    <p class="cart__total-amount-note">※配送料、代引きの場合手数料が加算されます。</p>
</div>
