@section('title', 'Home')

<div x-data="{ modal_open: false }" class="home container-mid">
    @include('components.flash-message')
    @include('components.modal-dialog', [
        'message' => __('messages.confirm.withdrawal'),
    ])

    <ul class="home__list">
        <li class="home__item">
            <a class="home__link link" href="{{ route('cart') }}">
                <i class="fa-solid fa-cart-shopping"></i>&nbsp;カート
            </a>
        </li>

        <li class="home__item">
            <a class="home__link link" href="{{ route('fav-list') }}">
                <i class="fa-solid fa-heart"></i>&nbsp;お気に入りリスト
            </a>
        </li>

        <li class="home__item">
            <a class="home__link link" href="{{ route('order.history') }}">
                <i class="fa-solid fa-clock-rotate-left"></i>&nbsp;注文履歴
            </a>
        </li>

        <li class="home__item">
            <a class="home__link link" href="{{ route('contact') }}">
                <i class="fa-solid fa-message"></i>&nbsp;お問い合わせ
            </a>
        </li>

        <li class="home__item home__item--with-message">
            <a class="home__link link" href="{{ route('settings.addressees') }}">
                <i class="fa-solid fa-house"></i>&nbsp;お届け先設定
            </a>

            <div x-data x-cloak x-show="$wire.addressee_not_exist" class="home__message speech-balloon-trigger">
                <i class="fa-solid fa-circle-exclamation fa-lg"></i>

                <span class="speech-balloon speech-balloon--right">
                    お届け先が登録されていません。
                </span>
            </div>
        </li>

        <li class="home__item">
            <a class="home__link link" href="{{ route('settings.email.reset') }}">
                <i class="fa-solid fa-envelope"></i>&nbsp;メールアドレス再設定
            </a>
        </li>

        <li class="home__item">
            <a class="home__link link" href="{{ route('settings.password.reset') }}">
                <i class="fa-solid fa-key"></i>&nbsp;パスワード再設定
            </a>
        </li>

        <li class="home__item">
            <a class="home__link link" href="{{ route('logout') }}">
                <i class="fa-solid fa-right-from-bracket"></i>&nbsp;ログアウト
            </a>
        </li>

        <li class="home__item">
            <a x-on:click="modal_open=true" class="home__link link">
                <i class="fa-solid fa-user-slash"></i>&nbsp;退会
            </a>
        </li>
    </ul>
</div>
