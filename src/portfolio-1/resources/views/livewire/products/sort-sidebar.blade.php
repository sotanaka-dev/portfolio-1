<aside x-show="sort_open" x-transition.opacity.scale.0.origin.top.right.duration.300ms.delay.150ms
    x-on:click.outside="sort_open=false" class="sort-sidebar sidebar">
    <div class="sidebar__head">
        <i x-on:click="sort_open=false" class="fa-solid fa-xmark fa-2xl"></i>
    </div>

    <select x-on:change="sort_open=false" class="sort-sidebar__select-box" wire:model.lazy="sort_by" size="6">
        <option class="sort-sidebar__select-box-item" value="created_at,desc">新着順</option>
        <option class="sort-sidebar__select-box-item" value="created_at,asc">古い順</option>
        <option class="sort-sidebar__select-box-item" value="name,asc">アルファベット順, A-Z</option>
        <option class="sort-sidebar__select-box-item" value="name,desc">アルファベット順, Z-A</option>
        <option class="sort-sidebar__select-box-item" value="price,asc">価格の低い順</option>
        <option class="sort-sidebar__select-box-item" value="price,desc">価格の高い順</option>
    </select>
</aside>
