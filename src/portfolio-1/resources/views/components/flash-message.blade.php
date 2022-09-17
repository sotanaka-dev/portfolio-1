@if (session('status'))
    <div class="alert alert--success" role="alert" id="alert">
        <i class="fa-solid fa-check fa-lg"></i>&nbsp;{{ session('status') }}
    </div>
@endif
