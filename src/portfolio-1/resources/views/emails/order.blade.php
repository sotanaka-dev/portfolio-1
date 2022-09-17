@component('mail::message')

{{ $user->name }}様<br>

ご注文ありがとうございます。<br>
内容は下記のとおりです。
<hr>

【注文内容】<br>
請求金額&nbsp;:&nbsp;&yen;{{ number_format($total_amount) }}<br>
支払方法&nbsp;:&nbsp;{{ $payment }}<br>

@component('mail::table')
| 商品名 | 価格 | 数量 |
| :- | :- | :- |
@foreach ($items as $item)
| {{ $item['name'] }} | &yen;&nbsp;{{ number_format($item['price']) }} | &times;&nbsp;{{ $item['qty'] }} |
@endforeach
@endcomponent

【注文者情報】<br>
氏名&nbsp;:&nbsp;{{ $user->name }}<br>
メールアドレス&nbsp;:&nbsp;{{ $user->email }}<br>
電話番号&nbsp;:&nbsp;{{ $user->tel }}<br>
郵便番号&nbsp;:&nbsp;&#12306;{{ $user->postal_code }}<br>
住所&nbsp;:&nbsp;{{ $user->address }}<br>
<hr>

{{-- 署名は views/vendor/mail/html/layout.blade.php に記述している --}}

@endcomponent
