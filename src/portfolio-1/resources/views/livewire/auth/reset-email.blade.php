@section('title', 'ResetEmail')

<div class="form container-sm">
    @include('components.loading-message', [
        'target' => 'resetEmail',
        'message' => __('messages.loading.send_mail'),
    ])

    <div class="form-group">
        <label class="form-group__label" for="email">
            メールアドレス
            @error('email')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <input wire:model.lazy="email" id="email" class="form-input" type="email" autofocus autocomplete="email" />
    </div>

    <button wire:click="resetEmail" class="btn">確認メールを送信</button>
</div>
