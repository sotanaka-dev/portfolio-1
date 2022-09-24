@section('title', 'Products')

<div x-data="{ sort_open: false, search_open: false }" class="products container-lg">
    <div x-cloak x-show="sort_open || search_open" class="full-overlay">
        @include('livewire.products.sort-sidebar')
        @include('livewire.products.search-sidebar')
    </div>

    <p class="products__select-category">{{ $select_category }}</p>

    <section class="products__toolbar">
        <p class="products__search-result-qty" style="font-weight: bold;">
            {{ $products->links('livewire::search-result-qty') }}
        </p>

        <div class="products__sidebar-icon-wrap">
            @include('livewire.products.sort-icon')

            <i x-on:click="search_open=true" class="fa-solid fa-magnifying-glass fa-2xl"></i>
        </div>
    </section>

    <section class="products-list products__list">
        @include('livewire.products.item-list')
    </section>

    {{ $products->links('livewire::custom') }}
</div>
