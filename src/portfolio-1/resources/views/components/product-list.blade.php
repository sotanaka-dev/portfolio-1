@foreach ($products as $product)
    <li class="products-list__item link link-line">
        <span class="products-list__fav-wrap">
            @livewire('fav-icon', ['product' => $product], key($product->id))
        </span>

        @if ($product->stock <= 0)
            <span class="products-list__stock-status">SOLD<br>OUT</span>
        @endif

        <a href='{{ route('products.detail', ['id' => $product->id]) }}'>
            <img class="image" src="{{ asset(current(glob($product->path . '*.*'))) }}">

            <p class="products-list__excerpt">
                <span>{{ $product->name }}</span>
                <span>&yen;{{ number_format($product->price) }}</span>
            </p>
        </a>
    </li>
@endforeach
