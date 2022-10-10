<div x-data="{ tmb_index: @entangle('tmb_index') }" x-init="$nextTick(() => { $refs.{{ $prefix . $tmb_index }}.classList.add('detail__tmb--select') })" class="detail__images">
    <div class="detail__main-image-wrap">
        <img class="image" src="{{ asset($main_image_path) }}">

        <div class="detail__fav-wrap">
            @livewire('fav-icon', ['product' => $product])
        </div>

        <div x-on:click="tmb_index ? tmb_index-- : tmb_index = {{ $max_length }}"
            class="detail__image-replacement detail__image-replacement--prev fa-stack fa-lg">
            <i class="fa-regular fa-circle fa-stack-2x"></i>
            <i class="fa-solid fa-angle-left fa-stack-1x"></i>
        </div>

        <div x-on:click="tmb_index < {{ $max_length }} ? tmb_index++ : tmb_index=0"
            class="detail__image-replacement detail__image-replacement--next fa-stack fa-lg">
            <i class="fa-regular fa-circle fa-stack-2x"></i>
            <i class="fa-solid fa-angle-right fa-stack-1x"></i>
        </div>
    </div>

    <div class="detail__tmb-wrap">
        @foreach ($image_paths as $path)
            <img x-on:click="tmb_index={{ $loop->index }}" x-ref="{{ $prefix . $loop->index }}" class="detail__tmb"
                src="{{ asset($path) }}">
        @endforeach
    </div>
</div>
