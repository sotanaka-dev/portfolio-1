@section('title', 'EditAddressee')

<div class="form container-sm h-adr">
    @include('components.flash-message')

    <div class="form-group">
        <label class="form-group__label" for="name">
            お名前
            @error('name')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input wire:model.lazy="name" type="text" id="name" class="form-input" autofocus autocomplete="name" />
    </div>

    <span class="p-country-name" style="display:none;">Japan</span>

    <div class="form-group">
        <label class="form-group__label" for="postal_code">
            郵便番号
            @error('postal_code')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input wire:model.lazy="postal_code" id="postal_code" class="form-input p-postal-code" type="text"
            autocomplete="postal-code" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="address">
            住所
            @error('address')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input wire:model.lazy="address" id="address"
            class="form-input p-region p-locality p-street-address p-extended-address" type="text" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="tel">
            電話番号
            @error('tel')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input wire:model.lazy="tel" id="tel" class="form-input" type="tel" autocomplete="tel-national" />
    </div>

    <button wire:click="editAddressee" class="btn">お届け先を再設定</button>
</div>
