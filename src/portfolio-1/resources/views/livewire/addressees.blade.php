@section('title', 'Addressees')

<div class="addressees container-sm">
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
        <a class="btn" href="{{ route('settings.addressees.add') }}">お届け先を追加する</a>
    </div>
</div>
