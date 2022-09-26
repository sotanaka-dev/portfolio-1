<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')&nbsp;/&nbsp;portfolio-1</title>

    {{-- NOTE: cssを上書きしないためにfontawesomeを先に読み込む --}}
    <script src="https://kit.fontawesome.com/b52cc897db.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.2.1/font-awesome-animation.css"
        type="text/css" media="all" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/destyle.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>

    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>

    @livewireStyles
</head>

<body>
    <header x-data="{ open: false }" id="header" class="header">
        <div x-cloak x-show="open" class="full-overlay">
            @include('components.header-sidebar')
        </div>

        <div class="header__inner container-lg">
            <div class="header__hamburger-menu">
                <i x-on:click="open=true" class="fa-solid fa-bars fa-xl"></i>
            </div>

            <a class="header__logo link" href="{{ route('top') }}">
                {{ config('app.name') }}
            </a>

            <nav class="header__menu">
                <ul class="header__menu-list">
                    <a class="link link-line" href="{{ route('top') }}">
                        <li>Top</li>
                    </a>

                    <a class="link link-line" href="{{ route('products') }}">
                        <li>Products</li>
                    </a>

                    <a class="link link-line" href="{{ route('access') }}">
                        <li>Access</li>
                    </a>

                    @auth
                        <a class="link link-line" href="{{ route('home') }}">
                            <li>Home</li>
                        </a>
                    @else
                        <a class="link link-line" href="{{ route('login') }}">
                            <li>Login</li>
                        </a>
                    @endauth
                </ul>
            </nav>

            <div class="header__icon-wrap">
                <a class="header__icon" href='{{ route('fav-list') }}'>
                    @livewire('components.qty-in-fav-list')
                    <i class="fa-solid fa-heart fa-xl"></i>
                </a>

                <a class="header__icon" href='{{ route('cart') }}'>
                    @livewire('components.qty-in-cart')
                    <i class="fa-solid fa-cart-shopping fa-xl"></i>
                </a>
            </div>
        </div>
    </header>
