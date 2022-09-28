@section('title', 'Register')

<div class="form container-sm">
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
