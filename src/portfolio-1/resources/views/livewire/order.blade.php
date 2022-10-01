@section('title', 'Order')

<div x-data="{ open: false }" class="order container-sm">
    @include('components.loading-message', [
        'target' => 'pressedExecBtn',
        'message' => __('messages.loading.order'),
    ])
    @include('components.modal-dialog', [
        'message' => __('messages.confirm.order'),
    ])


    <div class="order__info-group">
        <div x-data="{ select_open: false }" class="form-group">
            <label x-on:click="select_open=!select_open" class="form-group__label" for="select_box">
                お届け先を変更する
            </label>

            <select wire:model="select_addressee_id" x-cloak x-show="select_open" id="select_box" class="form-input">
                @foreach ($addressees as $addressee)
                    <option value="{{ $addressee->id }}">
                        &#12306;{{ $addressee->postal_code }}&nbsp;{{ $addressee->address }}&nbsp;{{ $addressee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="order__info-group-item">
            <h6>配送先</h6>
            <ul>
                <li>&#12306;{{ $select_addressee->postal_code }}</li>
                <li>{{ $select_addressee->address }}</li>
                <li>{{ $select_addressee->name }}</li>
            </ul>
        </div>

        <div class="order__info-group-item">
            <h6>連絡先</h6>
            <ul>
                <li>{{ $select_addressee->tel }}</li>
                <li>{{ Auth::user()->email }}</li>
            </ul>
        </div>

        <div class="order__link order__info-group-item">
            <a class="link link-line" href="{{ route('settings.addressees') }}">
                <i class="fa-solid fa-pen-to-square"></i>&nbsp;お届け先を追加・編集する
            </a>
        </div>
    </div>

    <div class="order__info-group">
        <div class="order__info-group-item">
            <h6>注文商品</h6>
            <ul>
                @foreach ($items as $item)
                    <li>
                        {{ $item['name'] }}&nbsp;&yen;{{ number_format($item['price']) }}&nbsp;&times;{{ $item['qty'] }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="order__info-group-item">
            <h6>合計金額</h6>
            <p>&yen;{{ number_format($total_amount) }}&nbsp;&#40;税込&#41;</p>
        </div>
    </div>

    <div class="order__btn-wrap">
        <button x-on:click="open=true" class="btn">注文を確定する</button>
    </div>
</div>
