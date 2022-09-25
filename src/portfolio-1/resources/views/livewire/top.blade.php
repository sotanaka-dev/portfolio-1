@section('title', 'Top')

<div class="top container-lg">
    <h2 class="top__heading">NEW</h2>

    <section class="products-list top__products-list">
        @include('livewire.products.item-list')
    </section>

    <a class="btn" href='{{ route('products') }}'>MORE</a>
</div>
