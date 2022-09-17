<aside class="search-sidebar sidebar">
    <div class="sidebar__head">
        <label for="search_sidebar_check">
            <i class="fa-solid fa-xmark fa-2xl"></i>
        </label>
    </div>

    <div class="search-sidebar__form">
        <select class="form-input form-input--circle" wire:model="category_id">
            <option value="0">ALL</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <input type="text" class="form-input form-input--circle" placeholder="キーワード" wire:model="keyword">

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
