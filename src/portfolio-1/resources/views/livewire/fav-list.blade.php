@section('title', 'FavList')

<div x-init="fav_items = JSON.parse(localStorage.getItem('fav_items') || '{}')" x-data="{ fav_items: @entangle('fav_items') }" class="fav-list  container-lg">

    @forelse ($fav_items as $fav_item)
        @if ($loop->first)
            <ul class="fav-list__items">
        @endif

        @livewire('fav-item', ['fav_item' => $fav_item], key($fav_item['id']))

        @if ($loop->last)
            </ul>
        @endif
    @empty
        <div class="empty-item">
            <p x-cloak x-show="!Object.keys(fav_items).length" class="empty-item__message">
                <i class="fa-solid fa-xmark fa-lg"></i>&nbsp;お気に入りリストは空です。
            </p>

            <a x-cloak x-show="!Object.keys(fav_items).length" class="btn" href="{{ route('products') }}">
                商品一覧へ
            </a>
        </div>
    @endforelse

</div>
