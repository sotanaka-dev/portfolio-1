@section('title', 'VerifyEmail')

<div class="verification container-sm">

    @include('components.flash-message')

    <p class="verification__message">
        <span class="verification__email">{{ $email }}</span><span class="new-line">に確認メールを送信しました。</span><br>
        メール内のリンクにアクセスし、<span class="new-line">登録を完了してください。</span>
    </p>


    <div class="verification__links">
        <a class="link link-line" href="{{ route('email.reset') }}">
            <i class="fa-solid fa-link"></i>&nbsp;メールアドレスを再登録する
        </a>

        <span onclick="document.getElementById('form').submit()" class="link link-line">
            <i class="fa-solid fa-envelope"></i>&nbsp;確認メールを再送信する
        </span>

        <form id="form" class="verification__resend-form" method="POST"
            action="{{ route('verification.resend') }}">
            @csrf
        </form>
    </div>
</div>
