@section('title', 'Top')

<div class="top container-lg">
    <h2 class="top__heading">New</h2>

    <section class="products-list top__products-list">
        @include('livewire.products.item-list')
    </section>

    <a class="top__link-to-products-list link link-line" href='{{ route('products') }}'>MORE</a>
</div>
