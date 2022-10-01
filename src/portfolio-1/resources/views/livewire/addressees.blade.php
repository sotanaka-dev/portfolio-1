@section('title', 'Addressees')

<div x-data="{ add_open: false }" @added-addressee="add_open=false" class="addressees container-sm">
    @include('components.flash-message')

    @forelse ($addressees as $addressee)
        @if ($loop->first)
            <ul class="addressees__list">
        @endif

        @livewire('addressee', ['addressee' => $addressee], key($addressee->id))

        @if ($loop->last)
            </ul>
        @endif
    @empty
        <div class="empty-item">
            <p class="empty-item__message">
                <i class="fa-solid fa-xmark fa-lg"></i>&nbsp;お届け先が追加されていません。
            </p>
        </div>
    @endforelse

    <div class="addressees__btn-wrap">
        <button x-on:click="add_open=!add_open" class="btn" type="button">お届け先を追加する</button>
    </div>

    @include('livewire.add-addressee')
</div>
