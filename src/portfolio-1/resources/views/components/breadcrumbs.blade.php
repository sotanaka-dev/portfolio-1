@unless($breadcrumbs->isEmpty())
    <div class="breadcrumb">
        <ol class="breadcrumb__list container-lg">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li class="link-line link-line--white breadcrumb__item breadcrumb__item--passive">
                        <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    </li>

                    <li class="breadcrumb__item">
                        <i class="fa-solid fa-caret-right fa-xl"></i>
                    </li>
                @else
                    <li class="breadcrumb__item breadcrumb__item--active">{{ $breadcrumb->title }}</li>
                @endif
            @endforeach
        </ol>
    </div>
@endunless
