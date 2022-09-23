@section('title', 'ResetPassword')

<div class="form container-sm">
    @include('components.loading-message', [
        'target' => 'sendResetLinkEmail',
        'message' => __('messages.loading.send_mail'),
    ])

    <div class="form-group">
        <label class="form-group__label" for="email">
            メールアドレス
            @error('email')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input type="email" class="form-input" id="email" autocomplete="email" autofocus wire:model.lazy="email" />
    </div>

    <button class="btn" wire:click="sendResetLinkEmail">メール送信</button>
</div>
