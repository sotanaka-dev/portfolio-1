@section('title', 'ProductDetail')

<div class="detail container-mid">

    @livewire('components.switch-product-image', ['product' => $product])

    <div class="detail__info-group">
        <p class="detail__name">{{ $product->name }}</p>
        <p class="detail__price">&yen;{{ number_format($product->price) }}</p>
        <p class="detail__category-name">Category:&nbsp;{{ $category_name }}</p>
        <p class="detail__sentence">{{ $product->description }}</p>

        @if ($stock >= 1)
            @if ($stock > 10)
                <p class="detail__stock-status text-success">
                    <i class="fa-solid fa-check"></i>&nbsp;在庫あり
                </p>
            @else
                <p class="detail__stock-status text-danger">
                    <i class="fa-solid fa-triangle-exclamation"></i>&nbsp;残り{{ $stock }}点
                </p>
            @endif

            <div class="detail__spin-btn">
                @include('livewire.components.spin-btn')
            </div>

            <button class="btn btn--lg btn--black" type="submit" wire:click="addProductToCart">
                カートに追加
            </button>
        @else
            <p class="detail__stock-status text-danger">
                <i class="fa-solid fa-xmark"></i>&nbsp;在庫なし
            </p>
        @endif
    </div>
</div>
