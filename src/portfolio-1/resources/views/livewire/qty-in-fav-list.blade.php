<span x-init="qty = Object.keys(JSON.parse(localStorage.getItem('fav_items') || '{}')).length" x-data="{ qty: @entangle('qty') }"class="header__counter">
    {{ $qty }}
</span>
