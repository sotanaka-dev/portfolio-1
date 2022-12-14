@if (session('message'))
    <div x-data="{
        show: false,
        init() {
            $nextTick(() => {
                this.show = true
                setTimeout(() => this.show = false, 5000)
            })
        }
    }" x-show="show" x-transition.opacity.scale.100.duration.1000ms class="flash-message">
        <i class="fa-solid fa-circle-check fa-lg"></i>&nbsp;{{ session('message') }}
    </div>
@endif
