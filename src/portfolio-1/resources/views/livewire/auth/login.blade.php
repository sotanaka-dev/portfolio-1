@section('title', 'Login')

<div class="form container-sm">
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
            @error('email')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input wire:model.lazy="email" id="email" class="form-input" type="email" autofocus
            autocomplete="email" />
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
            autocomplete="current-password" />
    </div>

    <div class="form-group">
        <input wire:model="remember" id="remember" class="form-group__checkbox" type="checkbox">

        <label for="remember">ログイン状態を記憶する</label>
    </div>

    <button wire:click="authenticate" class="btn">ログイン</button>
</div>
