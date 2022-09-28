@component('mail::message')

{{ $addressee->name }}様<br>

ご注文ありがとうございます。<br>
内容は下記のとおりです。
<hr>

【注文内容】<br>
請求金額&nbsp;:&nbsp;&yen;{{ number_format($total_amount) }}<br>

@component('mail::table')
| 商品名 | 価格 | 数量 |
| :- | :- | :- |
@foreach ($items as $item)
| {{ $item['name'] }} | &yen;&nbsp;{{ number_format($item['price']) }} | &times;&nbsp;{{ $item['qty'] }} |
@endforeach
@endcomponent

【注文者情報】<br>
氏名&nbsp;:&nbsp;{{ $addressee->name }}<br>
電話番号&nbsp;:&nbsp;{{ $addressee->tel }}<br>
郵便番号&nbsp;:&nbsp;&#12306;{{ $addressee->postal_code }}<br>
住所&nbsp;:&nbsp;{{ $addressee->address }}<br>
メールアドレス&nbsp;:&nbsp;{{ $user->email }}<br>
<hr>

{{-- 署名は views/vendor/mail/html/layout.blade.php に記述している --}}

@endcomponent
