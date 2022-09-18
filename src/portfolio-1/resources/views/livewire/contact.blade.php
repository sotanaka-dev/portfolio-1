@section('title', 'Contact')

<div class="container-sm">
    @include('components.flash-message')

    <div class="form-group">
        <label class="form-group__label" for="contact_text">お問い合わせ内容</label>

        @error('text')
            <strong class="form-group__error-message">{{ $message }}</strong>
        @enderror

        <textarea class="form-input form-input--textarea" id="contact_text" rows="10" autofocus wire:model.lazy="text"></textarea>
    </div>

    <button class="btn btn--lg btn--black" wire:click="submitContactForm">送信する</button>
</div>
