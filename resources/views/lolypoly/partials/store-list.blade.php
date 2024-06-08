@foreach ($stores as $store)
    <div class="row pb-3 mb-3 border-bottom">
        <div class="col-xxl-2 col-md-4 col-sm-4">
            <img src="{{ asset('images/store/store-1.png') }}" alt="" class="img-fluid">
        </div>
        <div class="col-xxl-6 col-md-8 col-sm-8 ps-3">
            <h5><b>{{ $store->title }}</b></h5>
            <p>{{ $store->address }}</p>
            <p>{{ $store->phone }}</p>
        </div>
        <div class="col-xxl-4 col-md-12 py-2 text-right">
            <div class="d-flex justify-content-end pe-3">
                <p class="mt-1 text-right"><a class="txt-color-main border-custom p-2 text-right"
                        href="https://www.google.com/maps/?q={{ $store->lattitude . ',' . $store->longitude }}"
                        target="_blank">Petunjuk
                        Arah <span><img src="{{ asset('images/icons/direction.png') }}" alt=""></span> </a></p>
            </div>
        </div>
    </div>
@endforeach
