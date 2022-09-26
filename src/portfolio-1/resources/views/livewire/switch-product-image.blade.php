<div x-data x-init="$nextTick(() => { $refs.{{ $prefix . $tmb_index }}.classList.add('detail__tmb--select') })" class="detail__images">
    <div class="detail__main-image-wrap">
        <img class="detail__main-image image" src="{{ asset($main_image_path) }}">

        <span class="detail__fav-wrap">
            @livewire('fav-icon', ['product' => $product])
        </span>

        <span wire:click="decrementTmbIndex" class="detail__image-replacement detail__image-replacement--prev fa-stack">
            <i class="fa-solid fa-circle fa-stack-2x fa-inverse"></i>
            <i class="fa-solid fa-angle-left fa-stack-1x"></i>
        </span>

        <span wire:click="incrementTmbIndex" class="detail__image-replacement detail__image-replacement--next fa-stack">
            <i class="fa-solid fa-circle fa-stack-2x fa-inverse"></i>
            <i class="fa-solid fa-angle-right fa-stack-1x"></i>
        </span>
    </div>

    <div class="detail__tmb-wrap">
        @foreach ($image_paths as $path)
            <img wire:click="setTmbIndex({{ $loop->index }})" x-ref="{{ $prefix . $loop->index }}" class="detail__tmb"
                src="{{ asset($path) }}">
        @endforeach
    </div>
</div>
