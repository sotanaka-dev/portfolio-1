<li x-data="{ id: {{ $fav_item['id'] }} }" class="fav-list__item link link-line">
    <div x-on:click="
            delete fav_items[id]
            localStorage.setItem('fav_items', JSON.stringify(fav_items))
            $store.qtyInFavList.setQty()"
        class="fav-list__rm speech-balloon-trigger">
        <i class="fa-solid fa-xmark fa-2xl"></i>

        <span class="speech-balloon speech-balloon--right">お気に入りから削除</span>
    </div>


    <a href="{{ route('products.detail', ['id' => $fav_item['id']]) }}">
        <img class="image" src="{{ asset(current(glob($fav_item['path'] . '*.*'))) }}">

        <p class="fav-list__name">{{ $fav_item['name'] }}</p>
    </a>
</li>
