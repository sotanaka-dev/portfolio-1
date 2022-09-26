@section('title', 'Order')

<div x-data="{ open: false }" class="order container-sm">
    @include('components.loading-message', [
        'target' => 'pressedExecBtn',
        'message' => __('messages.loading.order'),
    ])
    @include('components.modal-dialog', [
        'message' => __('messages.confirm.order'),
    ])

    <div class="order__table table">
        <div class="table__row">
            <span class="table__cell">お名前</span>
            <span class="table__cell">{{ $user->name }}</span>
        </div>

        <div class="table__row">
            <span class="table__cell">お届け先住所</span>
            <span class="table__cell">&#12306;{{ $user->postal_code }}&nbsp;&nbsp;{{ $user->address }}</span>
        </div>

        <div class="table__row">
            <span class="table__cell">メールアドレス</span>
            <span class="table__cell">{{ $user->email }}</span>
        </div>

        <div class="table__row">
            <span class="table__cell">電話番号</span>
            <span class="table__cell">{{ $user->tel }}</span>
        </div>

        <div class="table__row">
            <span class="table__cell">ご請求金額</span>
            <span class="table__cell">&yen;{{ number_format($total_amount) }}&nbsp;&#40;税込&#41;</span>
        </div>
    </div>

    <div class="order__select-payment select-payment">
        <label class="select-payment__item" for="credit">
            <input wire:model.defer="payment" id="credit" type="radio" checked name="payment" value="クレジットカード">
            クレジットカード
        </label>

        <label class="select-payment__item" for="convenience">
            <input wire:model.defer="payment" id="convenience" type="radio" name="payment" value="コンビニ決済">
            コンビニ決済
        </label>

        <label class="select-payment__item" for="cash">
            <input wire:model.defer="payment" id="cash" type="radio" name="payment" value="代金引換">
            代金引換
        </label>
    </div>

    <button x-on:click="open=true" class="btn">注文を確定する</button>
</div>
