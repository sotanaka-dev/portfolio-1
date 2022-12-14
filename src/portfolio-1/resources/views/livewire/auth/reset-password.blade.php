@section('title', 'ResetPassword')

<div class="form container-sm">
    @include('components.flash-message')

    <div class="form-group">
        <label class="form-group__label" for="current_password">
            現在のパスワード
            <i x-on:click="$dispatch('password-toggle', { el: $el })" class="fa-solid fa-eye"></i>

            @error('current_password')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input wire:model.lazy="current_password" id="current_password" class="form-input" type="password" autofocus
            autocomplete="current-password" />
    </div>

    <div class="form-group">
        <label class="form-group__label" for="new_password">
            新しいパスワード
            <i x-on:click="$dispatch('password-toggle', { el: $el })" class="fa-solid fa-eye"></i>

            @error('new_password')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input wire:model.lazy="new_password" id="new_password" class="form-input" type="password"
            autocomplete="new-password" />
    </div>

    <button wire:click="resetPassword" class="btn">パスワードを変更</button>
</div>
