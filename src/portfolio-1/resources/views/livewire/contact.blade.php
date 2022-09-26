@section('title', 'Contact')

<div class="form container-sm">
    @include('components.flash-message')

    <div class="form-group">
        <label class="form-group__label" for="contact_text">
            お問い合わせ内容
            @error('text')
                <strong class="form-group__error-message">{{ $message }}</strong>
            @enderror
        </label>

        <textarea wire:model.lazy="text" id="contact_text" class="form-input form-input--textarea" autofocus rows="10"></textarea>
    </div>

    <button wire:click="submitContactForm" class="btn">送信する</button>
</div>
