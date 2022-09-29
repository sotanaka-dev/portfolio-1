@section('title', 'Top')

<div class="top container-lg">
    <h2 class="top__heading">NEW</h2>

    <ul class="products-list top__products-list">
        @include('components.product-list')
    </ul>

    <a class="btn" href='{{ route('products') }}'>MORE</a>
</div>
