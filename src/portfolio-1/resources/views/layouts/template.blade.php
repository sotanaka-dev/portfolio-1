@include('components.header')

@if (request()->routeIs('top'))
    <div class="main-visual"></div>
@else
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endif

<main class="main">
    @yield('content')
</main>

@include('components.footer')
