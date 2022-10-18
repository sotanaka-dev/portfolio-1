<li x-data="{ modal_open: false, edit_open: @entangle('edit_open') }" class="addressees__item">
    @include('components.modal-dialog', [
        'message' => __('お届け先を削除します。よろしいですか？'),
    ])

    <div class="addressees__info-group">
        @if ($addressee->is_default)
            <p><i class="fa-solid fa-thumbtack"></i>&nbsp;デフォルトのお届け先</p>
        @endif
        <p>{{ $addressee->name }}</p>
        <p>&#12306;{{ $addressee->postal_code }}</p>
        <p>{{ $addressee->address }}</p>
        <p>{{ $addressee->tel }}</p>

        <div class="addressees__icon-wrap">
            <div x-on:click="
                    edit_open=!edit_open
                    $nextTick(() => {
                        if (edit_open) {
                            document.getElementById('name_{{ $addressee->id }}').focus()
                        }
                    })"
                class="speech-balloon-trigger">
                <i class="fa-solid fa-pen-to-square"></i>

                <span class="speech-balloon speech-balloon--right">お届け先を編集</span>
            </div>

            <div x-on:click="modal_open=true" class="speech-balloon-trigger">
                <i class="fa-solid fa-trash-can"></i>

                <span class="speech-balloon speech-balloon--right">お届け先を削除</span>
            </div>
        </div>
    </div>

    <div x-show="edit_open" x-transition.opacity.scale.origin.top.duration.300ms x-cloak id="edit_{{ $addressee->id }}"
        class="addressees__form form h-adr">
        <div class="form-group">
            <label class="form-group__label" for="name_{{ $addressee->id }}">
                お名前
                @error('name')
                    <strong class="form-group__error-message">{{ $message }}</strong>
                @enderror
            </label>

            <input wire:model.lazy="name" type="text" id="name_{{ $addressee->id }}" class="form-input" autofocus
                autocomplete="name" />
        </div>

        <span class="p-country-name" style="display:none;">Japan</span>

        <div class="form-group">
            <label class="form-group__label" for="postal_code_{{ $addressee->id }}">
                郵便番号
                @error('postal_code')
                    <strong class="form-group__error-message">{{ $message }}</strong>
                @enderror
            </label>

            <input wire:model.lazy="postal_code" id="postal_code_{{ $addressee->id }}" class="form-input p-postal-code"
                type="text" autocomplete="postal-code" />
        </div>

        <div class="form-group">
            <label class="form-group__label" for="address_{{ $addressee->id }}">
                住所
                @error('address')
                    <strong class="form-group__error-message">{{ $message }}</strong>
                @enderror
            </label>

            <input wire:model.lazy="address" id="address_{{ $addressee->id }}"
                class="form-input p-region p-locality p-street-address p-extended-address" type="text" />
        </div>

        <div class="form-group">
            <label class="form-group__label" for="tel_{{ $addressee->id }}">
                電話番号
                @error('tel')
                    <strong class="form-group__error-message">{{ $message }}</strong>
                @enderror
            </label>

            <input wire:model.lazy="tel" id="tel_{{ $addressee->id }}" class="form-input" type="tel"
                autocomplete="tel-national" />
        </div>

        <div class="form-group">
            <input wire:model="is_default" id="is_default_{{ $addressee->id }}" class="form-group__checkbox"
                type="checkbox">

            <label for="is_default_{{ $addressee->id }}">デフォルトのお届け先に設定する</label>
        </div>

        <button wire:click="editAddressee" class="btn">お届け先を更新</button>
    </div>
</li>
