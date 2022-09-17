@section('title', 'ResetUser')

<div class="container-sm h-adr">
    @include('components.flash-message')

    <div class="form-group">
        <label class="form-group__label" for="name">お名前</label>

        @error('name')
            <strong class="form-group__error-message">{{ $message }}</strong>
        @enderror

        <input type="text" class="form-input" id="name" autocomplete="name" autofocus wire:model.lazy="name" />
    </div>

    <span class="p-country-name" style="display:none;">Japan</span>

    <div class="form-group">
        <label class="form-group__label" for="postal_code">郵便番号</label>

        @error('postal_code')
            <strong class="form-group__error-message">{{ $message }}</strong>
        @enderror

        <input type="text" class="form-input p-postal-code" id="postal_code" autocomplete="postal-code"
            wire:model.lazy="postal_code" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="address">住所</label>

        @error('address')
            <strong class="form-group__error-message">{{ $message }}</strong>
        @enderror

        <input type="text" class="form-input p-region p-locality p-street-address p-extended-address" id="address"
            wire:model.lazy="address" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="tel">電話番号</label>

        @error('tel')
            <strong class="form-group__error-message">{{ $message }}</strong>
        @enderror

        <input type="tel" class="form-input" id="tel" autocomplete="tel-national" wire:model.lazy="tel" />
    </div>

    <button class="btn btn--lg btn--black" wire:click="resetAddressee">会員情報を変更</button>
</div>
