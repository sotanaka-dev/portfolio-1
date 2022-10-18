@section('title', 'ProductDetail')

<div class="detail container-mid">
    @include('components.flash-message')

    @livewire('switch-product-image', ['product' => $product])

    <div class="detail__info-group">
        <p class="detail__name">{{ $product->name }}</p>
        <p class="detail__price">&yen;{{ number_format($product->price) }}</p>
        <p class="detail__category-name">Category:&nbsp;{{ $category_name }}</p>
        <p class="detail__sentence">{{ $product->description }}</p>

        {!! $stock_status !!}

        @if ($stock)
            <div class="detail__spin-btn">
                @include('components.spin-btn')
            </div>

            <button wire:click="addProductToCart" class="btn" type="submit">
                カートに追加
            </button>
        @endif
    </div>
</div>
