@foreach ($transaction->detail as $list)
    <div class="row mb-3">
        <div class="col-md-2">
            @if ($list->product->image != '')
                <img src="{{ asset('' . $list->product->image . '') }}" alt="Product Image" class="img-fluid w-100">
            @else
                <img src="{{ asset('images/product/productx382.png') }}" alt="Product Image alt" class="img-fluid w-100">
            @endif
        </div>
        <div class="col-md-6">
            <h5> {{ isset($list->product) ? $list->product->title : '' }}</h5>
            <h6 class="text-hue">
                {{ isset($list->variant) ? 'Warna: ' . $list->variant->title : '' }} </h6>
            <h6 class="text-hue">
                {{ isset($list->type) ? 'Tipe: ' . $list->type->title : '' }}
            </h6>
        </div>
        <div class="col-md-2 text-center">
            <span class="text-center">{{ $list->stock }}x</span>
        </div>
        <div class="col-md-2 text-end">
            <span class="text-end">Rp. {{ number_format($list->price) }}</span>
        </div>
    </div>
@endforeach
