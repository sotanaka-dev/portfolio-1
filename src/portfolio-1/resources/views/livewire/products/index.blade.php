@section('title', 'Products')

<div class="products container-lg">
    <p class="products__select-category">{{ $select_category }}</p>

    <section class="products__toolbar">
        <p class="products__search-result-qty" style="font-weight: bold;">
            {{ $products->links('livewire::search-result-qty') }}
        </p>

        <div class="products__sidebars">
            <div class="sort-sidebar-wrap">
                <input class="sort-sidebar-check" id="sort_sidebar_check" type="checkbox">
                <label class="sort-sidebar-back" for="sort_sidebar_check"></label>
                @include('livewire.products.sort-sidebar')
                <label class="sort-sidebar-open" for="sort_sidebar_check">
                    @include('livewire.products.sort-icon')
                </label>
            </div>

            <div class="search-sidebar-wrap">
                <input class="search-sidebar-check" id="search_sidebar_check" type="checkbox">
                <label class="search-sidebar-back" for="search_sidebar_check"></label>
                @include('livewire.products.search-sidebar')
                <label class="search-sidebar-open" for="search_sidebar_check">
                    <i class="fa-solid fa-magnifying-glass fa-2xl"></i>
                </label>
            </div>
        </div>
    </section>

    <section class="products-list products__list">
        @include('livewire.products.item-list')
    </section>

    {{ $products->links('livewire::custom') }}
</div>
