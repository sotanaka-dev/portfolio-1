@section('title', 'ResetPassword')

<div class="container-sm">
    <div class="form-group">
        <label class="form-group__label" for="email">メールアドレス</label>

        @error('email')
            <strong class="form-group__error-message">{{ $message }}</strong>
        @enderror

        <input type="email" class="form-input" id="email" autocomplete="email" wire:model.lazy="email" />
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

        <input type="password" class="form-input" id="password" autocomplete="new-password" autofocus
            wire:model.lazy="password" />
    </div>

    <input type="hidden" wire:model.defer="token">

    <button class="btn btn--lg btn--black" wire:click="resetPassword">パスワード再登録</button>
</div>
