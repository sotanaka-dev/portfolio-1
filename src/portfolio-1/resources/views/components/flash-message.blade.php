@if (session('status'))
    <div x-data="{
        show: false,
        init() {
            $nextTick(() => {
                this.show = true
                setTimeout(() => this.show = false, 5000)
            })
        }
    }" x-show="show" x-transition.opacity.scale.100.duration.1000ms class="flash-message">
        <i class="fa-solid fa-circle-check fa-lg"></i>&nbsp;{{ session('status') }}
    </div>
@else
    <div x-data="{ showx: false, message: '' }"
        @flash.window="$nextTick(() => {
            message=$event.detail.message
            showx=true
            setTimeout(() => showx=false, 5000)
        })"
        x-show="showx" x-transition.opacity.scale.100.duration.1000ms x-cloak class="flash-message">
        <i class="fa-solid fa-circle-check fa-lg"></i>&nbsp;<span x-text="message"></span>
    </div>
@endif
