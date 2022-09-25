<aside x-show="search_open" x-transition.opacity.scale.0.origin.top.right.duration.300ms.delay.150ms
    x-on:click.outside="search_open=false" class="search-sidebar sidebar">
    <div class="sidebar__head">
        <i x-on:click="search_open=false" class="fa-solid fa-xmark fa-2xl"></i>
    </div>

    <div class="search-sidebar__form">
        <select class="form-input" wire:model="category_id">
            <option value="0">ALL</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <input type="text" class="form-input" placeholder="キーワード" wire:model="keyword">

        <div class="search-sidebar__search-result-qty-wrap">
            <div class="search-sidebar__search-result-qty">
                <span wire:loading.remove>
                    Rslt:&nbsp;{{ $products->links('livewire::search-result-qty') }}
                </span>

                <span wire:loading>
                    searching...<i class="fa-solid fa-spinner fa-spin fa-sm"></i>
                </span>
            </div>
        </div>
    </div>
</aside>
