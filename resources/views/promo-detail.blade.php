@extends('lolypoly.app')

@section('content')
    <div class="mb-5">
        <div class="container py-5">
            <div class="d-flex justify-content-center">
                <img src="{{ asset($promo->image) }}" alt="" class="img-fluid w-100" style="border-radius: 1rem; max-height:500px">
            </div>
        </div>

        <div class="container w-100">
            @foreach ($categories as $cat)
                @if ($cat->productCategory->count() > 0)
                    <h3>{{ $cat->title }}</h3>
                    <div class="d-flex w-100 gap-3 overflow-auto" style="max-height:550px; gap:10px;">
                        @foreach ($cat->productCategory as $pr)
                            @if ($pr->product)
                                <div class="d-flex flex-column justify-content-start border-hue p-3 my-3 other-product">
                                    <a href="{{ route('lolypoly.product.detail', ['id' => encrypt($pr->product->id)]) }}"
                                        class="text-center mb-3">
                                        @if ($pr->product->image != '')
                                            <img src="{{ asset('' . $pr->product->image . '') }}" alt="Product Image"
                                                class="img-fluid w-100 rounded aspect-ration-one" style="max-width:384px;">
                                        @else
                                            <img src="{{ asset('images/product/productx382.png') }}" alt="Product Image alt"
                                                class="img-fluid w-100 rounded aspect-ration-one" style="max-width:384px;">
                                        @endif
                                    </a>
                                    <h5 class="text-center"><a
                                            href="{{ route('lolypoly.product.detail', ['id' => encrypt($pr->product->id)]) }}">{{ $pr->product->title }}</a>
                                    </h5>
                                    <h5 class="text-center">Rp {{ number_format($pr->product->price, 0, ',', '.') }}</h5>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
