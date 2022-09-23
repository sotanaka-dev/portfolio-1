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

        <input type="text" class="form-input" id="name" autocomplete="name" autofocus
            wire:model.lazy="name" />
    </div>

    <span class="p-country-name" style="display:none;">Japan</span>

    <div class="form-group">
        <label class="form-group__label" for="postal_code">
            郵便番号
            @error('postal_code')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input type="text" class="form-input p-postal-code" id="postal_code" autocomplete="postal-code"
            wire:model.lazy="postal_code" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="address">
            住所
            @error('address')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input type="text" class="form-input p-region p-locality p-street-address p-extended-address" id="address"
            wire:model.lazy="address" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="tel">
            電話番号
            @error('tel')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input type="tel" class="form-input" id="tel" autocomplete="tel-national" wire:model.lazy="tel" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="email">
            メールアドレス
            @error('email')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input type="email" class="form-input" id="email" autocomplete="email" wire:model.lazy="email" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="password">
            パスワード
            <i x-on:click="$dispatch('password-toggle', { el: $el })" class="fa-solid fa-eye"></i>

            @error('password')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input type="password" class="form-input" id="password" autocomplete="new-password"
            wire:model.lazy="password" />
    </div>

    <button class="btn" wire:click="register">登録</button>
</div>
