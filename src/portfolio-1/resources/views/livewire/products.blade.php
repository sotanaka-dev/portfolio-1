@section('title', 'Products')

<div x-data="{ sort_open: false, search_open: false }" class="products container-lg">
    <div x-cloak x-show="sort_open || search_open" class="full-overlay">
        @include('components.sort-sidebar')
        @include('components.search-sidebar')
    </div>

    <p class="products__select-category">{{ $select_category }}</p>

    <div class="products__toolbar">
        <p class="products__search-result-qty" style="font-weight: bold;">
            {{ $products->links('livewire::search-result-qty') }}
        </p>

        <div class="products__sidebar-icon-wrap">
            <div class="speech-balloon-trigger">
                @include('components.sort-icon')

                <span class="speech-balloon speech-balloon--left">並べ替え</span>
            </div>

            <div class="speech-balloon-trigger">
                <i x-on:click="search_open=true" class="fa-solid fa-magnifying-glass fa-2xl"></i>

                <span class="speech-balloon speech-balloon--left">検索</span>
            </div>
        </div>
    </div>

    <ul class="products-list products__list">
        @include('components.product-list')
    </ul>

    {{ $products->links('livewire::custom') }}
</div>
