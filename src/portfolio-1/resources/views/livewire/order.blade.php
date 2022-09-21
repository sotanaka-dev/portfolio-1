@section('title', 'Order')

<div x-data="{ open: false }" class="order container-sm">
    @include('components.loading-message', [
        'target' => 'pressedExecBtn',
        'message' => __('messages.loading.order'),
    ])
    @include('livewire.components.modal-dialog', [
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
            <input type="radio" name="payment" id="credit" value="クレジットカード" wire:model.defer="payment" checked>
            クレジットカード
        </label>

        <label class="select-payment__item" for="convenience">
            <input type="radio" name="payment" id="convenience" value="コンビニ決済" wire:model.defer="payment">
            コンビニ決済
        </label>

        <label class="select-payment__item" for="cash">
            <input type="radio" name="payment" id="cash" value="代金引換" wire:model.defer="payment">
            代金引換
        </label>
    </div>

    <div class="split-btn">
        <div class="split-btn__return">
            <button class="btn btn--lg btn--black" onclick="location.href='{{ route('cart') }}'">カートに戻る</button>
        </div>

        <div class="split-btn__advance">
            <button x-on:click="open=true" class="btn btn--lg btn--black">注文を確定する</button>
        </div>
    </div>
</div>
