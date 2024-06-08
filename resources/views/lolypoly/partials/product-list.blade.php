<div class="row">
    @foreach ($productList as $pr)
        <div class="col-md-4 zoom-effect">
            <a href="{{ route('lolypoly.product.detail', ['id' => encrypt($pr->id)]) }}">
                @if ($pr->image != '')
                    <img src="{{ asset('' . $pr->image . '') }}" alt="Product Image" class="img-fluid w-100 shadow rounded">
                @else
                    <img src="{{ asset('images/product/productx382.png') }}" alt="Product Image alt"
                        class="img-fluid w-100 shadow rounded">
                @endif
            </a>
            <h5 class="my-3"><a
                    href="{{ route('lolypoly.product.detail', ['id' => encrypt($pr->id)]) }}">{{ $pr->title }}</a>
            </h5>
            <h5 class=""><b>Rp {{ number_format($pr->price, 0, ',', '.') }}</b></h5>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-center align-items-center my-5">
    @if ($totalMoreThanList)
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($currentPage == 1)
                    <li class="disabled mx-2" aria-disabled="true">
                        <span aria-hidden="true"><img src="{{ asset('images/icons/prev.svg') }}" alt=""></span>
                    </li>
                @else
                    <li class="mx-2">
                        <a href="#" rel="prev" onclick="previousPage()"><img
                                src="{{ asset('images/icons/next.svg') }}" alt=""
                                style="transform: scaleX(-1);"></a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($links as $i)
                    {{-- Array Of Links --}}
                    @if ($i == $currentPage)
                        <li class="active mx-2" aria-current="page"><span>{{ $i }}</span></li>
                    @else
                        @if ($i <= $totalPage && $i > 0)
                            <li class="mx-2"><a href="#"
                                    onclick="moveToPage('{{ $i }}')">{{ $i }}</a></li>
                        @endif
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($currentPage != $totalPage)
                    <li class="mx-2">
                        <a href="#" rel="next" onclick="nextPage()"><img
                                src="{{ asset('images/icons/next.svg') }}" alt=""></a>
                    </li>
                @else
                    <li class="disabled mx-2" aria-disabled="true">
                        <span aria-hidden="true"><img src="{{ asset('images/icons/prev.svg') }}" alt=""
                                style="transform: scaleX(-1);"></span>
                    </li>
                @endif
            </ul>
        </nav>
    @else
        <ul class="pagination">
            <li class="disabled mx-2" aria-disabled="true">
                <span aria-hidden="true"><img src="{{ asset('images/icons/prev.svg') }}" alt=""></span>
            </li>
            <li class="active mx-2" aria-current="page">
                <span>1</span>
            </li>
            <li class="disabled mx-2" aria-disabled="true">
                <span aria-hidden="true"><img src="{{ asset('images/icons/prev.svg') }}" alt=""
                        style="transform: scaleX(-1);"></span>
            </li>
        </ul>
    @endif
</div>
