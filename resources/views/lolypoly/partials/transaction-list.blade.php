@if ($data->detail != [])
    <div class="row pb-3 border-bottom">
        <div class="col-md-2">
            <span class="pb-3">{{ $data->transaction_code }} </span><br>
            <span class="text-hue">{{ $dateFormat }}</span>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-between mb-3">
                @if ($data->detail->first()->product)
                    <h5 class="flex-basis-50">{{ $data->detail->first()->product->title }}
                    </h5>
                @else
                    <h5 class="flex-basis-50">{{ $data->detail->first()->first()->id }}
                    </h5>
                @endif
                @if ($data->detail->count() - 1 > 0)
                    <h5 class="text-hue p-2" style="background: rgba(245, 246, 248, 1)">+{{ $data->detail->count() - 1 }}</h5>
                @endif
            </div>
            <div class="row gap-1">
                @foreach ($data->detail as $key => $value)
                    @if ($value->product)
                        @if ($key <= 2)
                            <div class="col-md-4">
                                @if ($value->product->image != '')
                                    <img src="{{ asset('' . $value->product->image . '') }}" alt="Product Image"
                                        class="img-fluid w-100">
                                @else
                                    <img src="{{ asset('images/product/productx382.png') }}" alt="Product Image alt"
                                        class="img-fluid w-100">
                                @endif
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
            <button class="bg-white txt-color-main border-custom details-history my-3" data-id="{{ $data->id }}"
                role="button" onclick="getDetailHistory('{{ $data->id }}')">See
                Detail ></button>
        </div>
        <div class="col-md-2">
            <div class="{{ $statusClass }} text-center py-2 px-3 rounded-pill">
                <span>
                    {{ $data->statusTransaction->title }}
                </span>
            </div>
        </div>
        <div class="col-md-2">
            <h5 class="text-hue mb-3">Total Belanja</h5>
            <h4>Rp. {{ number_format($data->total) }}</h4>
        </div>
    </div>
@endif
