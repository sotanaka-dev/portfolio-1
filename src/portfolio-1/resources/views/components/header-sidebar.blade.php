<aside x-show="open" x-transition.opacity.scale.0.origin.top.left.duration.300ms.delay.150ms
    x-on:click.outside="open=false" class="header-sidebar sidebar">
    <div class="sidebar__head">
        <i x-on:click="open=false" class="fa-solid fa-xmark fa-2xl"></i>
    </div>

    <nav>
        <ul>
            <li class="header-sidebar__item">
                <a class="header-sidebar__link link" href="{{ route('top') }}">
                    Top
                </a>
            </li>
            <li class="header-sidebar__item">
                <a class="header-sidebar__link link" href='{{ route('products') }}'>
                    Products
                </a>
            </li>
            <li class="header-sidebar__item">
                <a class="header-sidebar__link link" href="{{ route('access') }}">
                    Access
                </a>
            </li>
            @auth
                <li class="header-sidebar__item">
                    <a class="header-sidebar__link link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
            @else
                <li class="header-sidebar__item">
                    <a class="header-sidebar__link link" href="{{ route('login') }}">
                        Login
                    </a>
                </li>
            @endauth
            <li class="header-sidebar__item">
                <a class="header-sidebar__link link" href='{{ route('fav-list') }}'>
                    FavList
                </a>
            </li>
            <li class="header-sidebar__item">
                <a class="header-sidebar__link link" href='{{ route('cart') }}'>
                    Cart
                </a>
            </li>
        </ul>
    </nav>
</aside>
