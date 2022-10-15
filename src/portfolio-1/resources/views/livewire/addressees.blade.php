@section('title', 'Addressees')

<div x-data="{ add_open: @entangle('add_open') }" class="addressees container-sm">
    <div x-data="{ show: false, message: '' }"
        @request-flash-message.window="$nextTick(() => {
            message=$event.detail.message
            show=true
            setTimeout(() => show=false, 5000)
        })"
        x-show="show" x-transition.opacity.scale.100.duration.1000ms x-cloak class="flash-message">
        <i class="fa-solid fa-circle-check fa-lg"></i>&nbsp;<span x-text="message"></span>
    </div>

    @forelse ($addressees as $addressee)
        @if ($loop->first)
            <ul class="addressees__list">
        @endif

        @livewire('addressee', ['addressee' => $addressee], key($addressee->id))

        @if ($loop->last)
            </ul>
        @endif
    @empty
        <div class="empty-item">
            <p class="empty-item__message">
                <i class="fa-solid fa-xmark fa-lg"></i>&nbsp;お届け先が追加されていません。
            </p>
        </div>
    @endforelse

    <div class="addressees__btn-wrap">
        <button
            x-on:click="
                add_open=!add_open
                $nextTick(() => {
                    if (add_open) {
                        document.getElementById('name').focus()
                    }
                })"
            class="btn" type="button">お届け先を追加する</button>
    </div>

    <div x-show="add_open" x-transition.opacity.scale.origin.top.duration.300ms x-cloak
        class="addressees__form form h-adr">
        <div class="form-group">
            <label class="form-group__label" for="name">
                お名前
                @error('name')
                    <strong class="form-group__error-message">{{ $message }}</strong>
                @enderror
            </label>

            <input wire:model.lazy="name" id="name" class="form-input" type="text" autofocus
                autocomplete="name" />
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

            <input wire:model.lazy="tel" id="tel" class="form-input" type="tel"
                autocomplete="tel-national" />
        </div>

        <div class="form-group">
            <input wire:model="is_default" id="is_default" class="form-group__checkbox" type="checkbox">

            <label for="is_default">デフォルトのお届け先に設定する</label>
        </div>

        <button wire:click="addAddressee" class="btn">お届け先を追加</button>
    </div>
</div>
