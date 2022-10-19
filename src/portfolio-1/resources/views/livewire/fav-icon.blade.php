<div x-cloak x-data="{
    init() {
            fav_items = JSON.parse(localStorage.getItem('fav_items') || '{}')
        },
        id: {{ $product->id }},
        product: {{ $fav_item->toJson() }},
}" class="fav-icon">

    <div x-show="!(id in fav_items)"
        x-on:click="
            fav_items[id] = product
            localStorage.setItem('fav_items', JSON.stringify(fav_items))
            $wire.emitSelf('refresh')
            $store.qtyInFavList.setQty()"
        class="fav-icon__add speech-balloon-trigger">
        <i class="fa-solid fa-heart animated-hover faa-pulse fa-xl"></i>

        <span class="speech-balloon speech-balloon--right">お気に入りに追加</span>
    </div>

    <div x-show="id in fav_items"
        x-on:click="
            delete fav_items[id]
            localStorage.setItem('fav_items', JSON.stringify(fav_items))
            $wire.emitSelf('refresh')
            $store.qtyInFavList.setQty()"
        class="fav-icon__rm speech-balloon-trigger">
        <i class="fa-solid fa-heart animated-hover faa-pulse fa-xl"></i>

        <span class="speech-balloon speech-balloon--right">お気に入りから削除</span>
    </div>
</div>
