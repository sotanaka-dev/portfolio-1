@section('title', 'Login')

<div class="container-sm">
    @include('components.flash-message')

    <div class="form-link">
        <div class="form-link__item">
            <a class="link link-line" href="{{ route('register') }}">
                <i class="fa-solid fa-link"></i>&nbsp;会員登録がまだの方はこちら
            </a>
        </div>

        <div class="form-link__item">
            <a class="link link-line" href="{{ route('password.email') }}">
                <i class="fa-solid fa-link"></i>&nbsp;パスワードをお忘れの方はこちら
            </a>
        </div>
    </div>

    <div class="form-group">
        <label class="form-group__label" for="email">
            メールアドレス
        </label>
        @error('email')
            <strong class="form-group__error-message">{{ $message }}</strong>
        @enderror
        <input type="email" class="form-input" id="email" autocomplete="email" autofocus
            wire:model.lazy="email" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="password">
            パスワード
            <i class="fa-solid fa-eye" id="password_eye_icon"
                onclick="passwordMaskSwitch('password', 'password_eye_icon')"></i>
        </label>
        @error('password')
            <strong class="form-group__error-message">{{ $message }}</strong>
        @enderror
        <input type="password" class="form-input" id="password" autocomplete="current-password"
            wire:model.lazy="password" />

        <div style="margin-top: 12px;">
            <input type="checkbox" id="remember" wire:model="remember">
            <label for="remember">ログイン状態を記憶する</label>
        </div>
    </div>

    <button class="btn btn--lg btn--black" wire:click="authenticate">ログイン</button>
</div>
