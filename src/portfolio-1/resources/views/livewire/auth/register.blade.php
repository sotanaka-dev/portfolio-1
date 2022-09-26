@section('title', 'Register')

<div class="form container-sm h-adr">
    @include('components.loading-message', [
        'target' => 'register',
        'message' => __('messages.loading.register'),
    ])

    <div class="form-link">
        <div class="form-link__item">
            <a class="link link-line" href="{{ route('login') }}">
                <i class="fa-solid fa-link"></i>&nbsp;アカウントをお持ちの方こちら
            </a>
        </div>
    </div>

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

        <input wire:model.lazy="tel" id="tel" class="form-input" type="tel" autocomplete="tel-national" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="email">
            メールアドレス
            @error('email')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input wire:model.lazy="email" id="email" class="form-input" type="email" autocomplete="email" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="password">
            パスワード
            <i x-on:click="$dispatch('password-toggle', { el: $el })" class="fa-solid fa-eye"></i>

            @error('password')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input wire:model.lazy="password" id="password" class="form-input" type="password"
            autocomplete="new-password" />
    </div>

    <button wire:click="register" class="btn">登録</button>
</div>
