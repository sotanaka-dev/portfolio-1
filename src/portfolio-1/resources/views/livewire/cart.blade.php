@section('title', 'Cart')

<div class="cart container-mid">
    @forelse ($items as $item)
        @if ($loop->first)
            <ul class="cart__list">
        @endif

        @livewire('cart-item', ['item' => $item], key($item['id']))

        @if ($loop->last)
            </ul>

            @livewire('total-amount-in-cart')

            <div class="cart__btn-wrap">
                <a class="btn" href="{{ route('order') }}">注文画面へ進む</a>
            </div>
        @endif
    @empty
        <div class="empty-item">
            <p class="empty-item__message"><i class="fa-solid fa-xmark fa-lg"></i>&nbsp;カートは空です。</p>

            <a class="btn" href="{{ route('products') }}">商品一覧へ</a>
        </div>
    @endforelse
</div>
