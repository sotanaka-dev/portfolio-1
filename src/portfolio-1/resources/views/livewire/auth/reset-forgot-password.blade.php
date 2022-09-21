@section('title', 'ResetPassword')

<div class="container-sm">
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

        <input type="password" class="form-input" id="password" autocomplete="new-password" autofocus
            wire:model.lazy="password" />
    </div>

    <input type="hidden" wire:model.defer="token">

    <button class="btn btn--lg btn--black" wire:click="resetPassword">パスワード再登録</button>
</div>
