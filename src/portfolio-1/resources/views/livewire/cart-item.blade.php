<div class="cart__item">
    <a class="cart__item-image" href='{{ route('products.detail', ['id' => $item['id']]) }}'>
        <img class="image" src="{{ asset(current(glob($item['path'] . '*.*'))) }}">
    </a>

    <div class="cart__info-group">
        <p class="cart__item-name">{{ $item['name'] }}</p>
        <p class="cart__item-price">&yen;{{ number_format($item['price']) }}</p>

        <div class="cart__form">

            @include('livewire.components.spin-btn')

            <div class="cart__remove-wrap">
                <button wire:click="removeItem" class="speech-balloon-trigger">
                    <i class="fa-solid fa-trash-can fa-lg"></i>
                </button>

                <span class="cart__speech-balloon speech-balloon speech-balloon--left">カートから削除</span>
            </div>
        </div>
    </div>
</div>
