@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled mx-2" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"><img src="{{ asset('images/icons/prev.svg') }}" alt=""></span>
                </li>
            @else
                <li  class="mx-2">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><img
                            src="{{ asset('images/icons/next.svg') }}" alt="" style="transform: scaleX(-1);"></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled mx-2" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active mx-2" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class="mx-2"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="mx-2">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><img
                            src="{{ asset('images/icons/next.svg') }}" alt=""></a>
                </li>
            @else
                <li class="disabled mx-2" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><img src="{{ asset('images/icons/prev.svg') }}" alt="" style="transform: scaleX(-1);"></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
