<aside class="header-sidebar sidebar">
    <div class="sidebar__head">
        <label for="header_sidebar_check">
            <i class="fa-solid fa-xmark fa-2xl"></i>
        </label>
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
