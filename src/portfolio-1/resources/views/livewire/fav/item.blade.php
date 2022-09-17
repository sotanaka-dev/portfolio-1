<li x-data="{ id: {{ $fav_item['id'] }} }" class="fav-list__item link link-line">
    <span
        x-on:click="
            delete fav_items[id]
            localStorage.setItem('fav_items', JSON.stringify(fav_items))
            $wire.emitTo('components.qty-in-fav-list', 'decrement')"
        class="fav-list__rm fa-stack speech-balloon-trigger">
        <i class="fa-solid fa-circle fa-stack-2x fa-inverse"></i>
        <i class="fa-solid fa-xmark fa-lg fa-stack-1x"></i>
    </span>

    <span class="fav-list__speech-balloon speech-balloon speech-balloon--right">お気に入りから削除</span>

    <a href="{{ route('products.detail', ['id' => $fav_item['id']]) }}">
        <img class="image" src="{{ asset(current(glob($fav_item['path'] . '*.*'))) }}">

        <p class="fav-list__name">{{ $fav_item['name'] }}</p>
    </a>
</li>
