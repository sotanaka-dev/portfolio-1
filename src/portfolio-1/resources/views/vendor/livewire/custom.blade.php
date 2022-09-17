@if ($paginator->hasPages())
    <nav class="pagination">
        {{-- 表示数 --}}
        <p class="pagination__num-of-displays">
            {{ $paginator->total() }}&nbsp;件中
            @if ($paginator->count() > 1)
                {{ $paginator->firstItem() }}&nbsp;&#45;
            @endif
            {{ $paginator->lastItem() }}&nbsp;件目
        </p>

        <ul class="pagination__inner">
            {{-- 前のページへのリンク --}}
            @if (!$paginator->onFirstPage())
                <li>
                    <button class="pagination__item pagination__item--passive"
                        wire:click="previousPage('{{ $paginator->getPageName() }}')" rel="prev"
                        aria-label="@lang('pagination.previous')">&lt;&nbsp;</button>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- ページ数が多い場合のドット --}}
                @if (is_string($element))
                    <li class="pagination__item" aria-disabled="true">
                        <span>{{ $element }}</span>
                    </li>
                @endif

                {{-- カレントページと各ページへのリンク --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination__item pagination__item--active" aria-current="page">
                                <span>{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <button class="pagination__item  pagination__item--passive"
                                    wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- 次ページへのリンク --}}
            @if ($paginator->hasMorePages())
                <li>
                    <button class="pagination__item  pagination__item--passive"
                        wire:click="nextPage('{{ $paginator->getPageName() }}')" rel="next"
                        aria-label="@lang('pagination.next')">&nbsp;&gt;</button>
                </li>
            @endif
        </ul>
    </nav>
@endif
