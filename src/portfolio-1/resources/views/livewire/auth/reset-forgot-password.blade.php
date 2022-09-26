@section('title', 'ResetPassword')

<div class="form container-sm">
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

        <input wire:model.lazy="password" id="password" class="form-input" type="password" autofocus
            autocomplete="new-password" />
    </div>

    <input wire:model.defer="token" type="hidden">

    <button wire:click="resetPassword" class="btn">パスワード再登録</button>
</div>
