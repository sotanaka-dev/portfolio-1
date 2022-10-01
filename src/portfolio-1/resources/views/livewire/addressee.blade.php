<li x-data="{ open: false, edit_open: false }" @edited-addressee="edit_open=false" class="addressees__item">
    @include('components.modal-dialog', [
        'message' => __('お届け先を削除します。よろしいですか？'),
    ])

    <div class="addressees__info-group">
        <p>{{ $addressee->name }}</p>
        <p>&#12306;{{ $addressee->postal_code }}</p>
        <p>{{ $addressee->address }}</p>
        <p>{{ $addressee->tel }}</p>

        <div class="addressees__icon-wrap">
            <div class="addressees__edit">
                <button x-on:click="edit_open=!edit_open" class="speech-balloon-trigger" type="button">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <span class="addressees__speech-balloon speech-balloon speech-balloon--right">お届け先を編集</span>
            </div>

            <div class="addressees__remove">
                <button x-on:click="open=true" class="speech-balloon-trigger" type="button">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <span class="addressees__speech-balloon speech-balloon speech-balloon--right">お届け先を削除</span>
            </div>
        </div>
    </div>

    @include('livewire.edit-addressee')
</li>
