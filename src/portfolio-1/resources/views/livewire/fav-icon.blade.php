<span x-cloak x-data="{
    init() {
            fav_items = JSON.parse(localStorage.getItem('fav_items') || '{}')
        },
        id: {{ $product->id }},
        product: {{ $fav_item->toJson() }},
}" class="fav-icon">

    <span x-show="!(id in fav_items)"
        x-on:click="
            fav_items[id] = product
            localStorage.setItem('fav_items', JSON.stringify(fav_items))
            $wire.emitSelf('refresh')
            $wire.emitTo('qty-in-fav-list', 'increment')"
        class="fav-icon__add speech-balloon-trigger fa-stack">
        <i class="fa-solid fa-circle fa-stack-2x fa-inverse"></i>
        <i class="fa-solid fa-heart fa-stack-1x animated-hover faa-pulse"></i>
    </span>

    <span class="fav-icon__speech-balloon speech-balloon speech-balloon--right">お気に入りに追加</span>

    <span x-show="id in fav_items"
        x-on:click="
            delete fav_items[id]
            localStorage.setItem('fav_items', JSON.stringify(fav_items))
            $wire.emitSelf('refresh')
            $wire.emitTo('qty-in-fav-list', 'decrement')"
        class="fav-icon__rm speech-balloon-trigger fa-stack">
        <i class="fa-solid fa-circle fa-stack-2x fa-inverse"></i>
        <i class="fa-solid fa-heart fa-stack-1x animated-hover faa-pulse"></i>
    </span>

    <span class="fav-icon__speech-balloon speech-balloon speech-balloon--right">お気に入りから削除</span>
</span>
