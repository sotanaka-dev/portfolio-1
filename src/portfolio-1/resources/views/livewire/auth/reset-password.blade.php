@section('title', 'ResetPassword')

<div class="container-sm">
    @include('components.flash-message')

    <div class="form-group">
        <label class="form-group__label" for="current_password">
            現在のパスワード
            <i class="fa-solid fa-eye" id="current_password_eye_icon"
                onclick="passwordMaskSwitch('current_password', 'current_password_eye_icon')"></i>
        </label>

        @error('current_password')
            <strong class="form-group__error-message">{{ $message }}</strong>
        @enderror

        <input class="form-input" type="password" id="current_password" autocomplete="current-password" autofocus
            wire:model.lazy="current_password" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="new_password">
            新しいパスワード
            <i class="fa-solid fa-eye" id="new_password_eye_icon"
                onclick="passwordMaskSwitch('new_password', 'new_password_eye_icon')"></i>
        </label>

        @error('new_password')
            <strong class="form-group__error-message">{{ $message }}</strong>
        @enderror

        <input class="form-input" type="password" id="new_password" autocomplete="new-password"
            wire:model.lazy="new_password" />
    </div>

    <button class="btn btn--lg btn--black" wire:click="resetPassword">パスワードを変更</button>
</div>
