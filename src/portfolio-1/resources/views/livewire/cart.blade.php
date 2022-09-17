@section('title', 'Cart')

<div class="cart container-lg">
    @forelse ($items as $item)
        @livewire('cart-item', ['item' => $item], key($item['id']))

        @if ($loop->last)
            @livewire('components.total-amount-in-cart')

            <button class=" btn btn--lg btn--black" onclick="location.href='{{ route('order') }}'">
                注文画面へ進む
            </button>
        @endif
    @empty
        <p class="empty-item-message"><i class="fa-solid fa-xmark fa-lg"></i>&nbsp;カートは空です。</p>

        <button class="btn btn--lg btn--black" onclick="location.href='{{ route('products') }}'">商品一覧へ</button>
    @endforelse
</div>
