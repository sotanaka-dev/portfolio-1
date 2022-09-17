@section('title', 'ProductDetail')

<div class="detail container-mid">

    @livewire('components.switch-product-image', ['product' => $product])

    <div class="detail__info-group">
        <p class="detail__name">{{ $product->name }}</p>
        <p class="detail__price">&yen;{{ number_format($product->price) }}</p>
        <p class="detail__category-name">Category:&nbsp;{{ $category_name }}</p>
        <p class="detail__sentence">{{ $product->description }}</p>

        {!! $stock_status !!}

        @if ($stock)
            <div class="detail__spin-btn">
                @include('livewire.components.spin-btn')
            </div>

            <button class="btn btn--lg btn--black" type="submit" wire:click="addProductToCart">
                カートに追加
            </button>
        @endif
    </div>
</div>
