<div x-data class="spin-btn">
    <div x-on:click="$wire.qty >= 1 && $wire.qty--" class="spin-btn--minus">
        <i class="fa-solid fa-minus fa-lg"></i>
    </div>

    <input x-model.lazy="$wire.qty" type="number" class="form-input form-input--border-none">

    <div x-on:click="$wire.qty < $wire.stock && $wire.qty++" class="spin-btn--plus">
        <i class="fa-solid fa-plus fa-lg"></i>
    </div>
</div>
