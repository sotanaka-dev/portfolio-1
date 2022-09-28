<li x-data="{ open: false }" class="addressees__item">
    @include('components.flash-message')
    @include('components.modal-dialog', [
        'message' => __('お届け先を削除します。よろしいですか？'),
    ])

    <p>{{ $addressee->name }}</p>
    <p>&#12306;{{ $addressee->postal_code }}</p>
    <p>{{ $addressee->address }}</p>
    <p>{{ $addressee->tel }}</p>

    <div class="addressees__icon-wrap">
        <div class="addressees__edit">
            <a class="speech-balloon-trigger" href="{{ route('settings.addressees.edit', ['id' => $addressee->id]) }}">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

            <span class="addressees__speech-balloon speech-balloon speech-balloon--right">お届け先を編集</span>
        </div>

        <div class="addressees__remove">
            <button x-on:click="open=true" class="speech-balloon-trigger" type="button">
                <i class="fa-solid fa-trash-can"></i>
            </button>

            <span class="addressees__speech-balloon speech-balloon speech-balloon--right">お届け先を削除</span>
        </div>
    </div>
</li>
