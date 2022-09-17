@component('mail::message')
{{ $user->name }}様<br>

この度は{{ config('app.name') }}にご登録いただき、誠にありがとうございます。<br>
引き続きお買い物をお楽しみください。
<hr>

【登録情報】<br>
メールアドレス&nbsp;:&nbsp;{{ $user->email }}<br>
パスワード&nbsp;:&nbsp;●●●●●●●●
<hr>

{{-- 署名は views/vendor/mail/html/layout.blade.php に記述している --}}

@endcomponent
