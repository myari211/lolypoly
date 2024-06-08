@extends('lolypoly.app')

@section('content')
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach ($slider as $item)
                <div class="swiper-slide">
                    <a class="w-100 h-100" href="{{ $item->url }}">
                        <div class="swiper-slide slide-2 h-100"
                            style="background: rgba(0, 0, 0, 0) url('{{ asset($item->image) }}') no-repeat scroll center center / cover; width: 100%;">
                            <div class="container-xxl vertical-center-content">
                                <div class="row align-items-center h-100 w-100"></div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- If we need pagination -->
        {{-- <div class="swiper-pagination"></div> --}}

        <!-- If we need navigation buttons -->
        {{-- <div class="swiper-button-prev"></div> --}}
        {{-- <div class="swiper-button-next"></div> --}}

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
    <section class="my-5 bg-white">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-lg-12">
                    <div class="text-center">
                        <hr class="section-divider">
                        <h1>Our Popular Products</h1>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-6 mb-3 zoom-effect" style="position: relative;">
                            <a href="{{ route('lolypoly.shopping', ['id' => $topCategories->first()->id]) }}">
                                @if ($topCategories->first()->image != '')
                                    <img class="popular-product-image"
                                        src="{{ asset('' . $topCategories->first()->image . '') }}" alt="">
                                @else
                                    <img class="popular-product-image"
                                        src="{{ asset('images/categories/categories-2.png') }}" alt="">
                                @endif
                            </a>
                            <div class="bottom-left">
                                <h2><a href="{{ route('lolypoly.shopping', ['id' => $topCategories->first()->id]) }}"
                                        class="text-light">{{ $topCategories->first()->title }}</a></h2>
                                <h3><a href="{{ route('lolypoly.shopping', ['id' => $topCategories->first()->id]) }}"
                                        class="text-light">{{ $topCategories->first()->productCategory->count() }} Produk
                                        Baru</a>
                                </h3>
                            </div>
                        </div>
                        @foreach ($bestProduct as $pr)
                            <div class="col-md-6 col-lg-3 col-sm-6 mb-3 col-6 zoom-effect">
                                <a href="{{ route('lolypoly.product.detail', ['id' => encrypt($pr->id)]) }}">
                                    @if ($pr->image != '')
                                        <img src="{{ asset('' . $pr->image . '') }}" alt="Product Image"
                                            class="img-fluid w-100 shadow-sm rounded aspect-ration-one">
                                    @else
                                        <img src="{{ asset('images/product/productx382.png') }}" alt="Product Image alt"
                                            class="img-fluid w-100 shadow-sm rounded aspect-ration-one">
                                    @endif
                                </a>
                                <h5 class="mt-3"><a
                                        href="{{ route('lolypoly.product.detail', ['id' => encrypt($pr->id)]) }}">{{ $pr->title }}</a>
                                </h5>
                                <h5><b>Rp {{ number_format($pr->price, 0, ',', '.') }}</b></h5>
                            </div>
                        @endforeach
                        <div class="col-md-6 mb-3 zoom-effect" style="position: relative;">
                            <a href="{{ route('lolypoly.shopping', ['id' => $topCategories->last()->id]) }}">
                                @if ($topCategories->last()->image != '')
                                    <img class="popular-product-image"
                                        src="{{ asset('' . $topCategories->last()->image . '') }}" alt="">
                                @else
                                    <img class="popular-product-image"
                                        src="{{ asset('images/categories/categories-2.png') }}" alt="">
                                @endif
                            </a>
                            <div class="bottom-left">
                                <h2><a href="{{ route('lolypoly.shopping', ['id' => $topCategories->last()->id]) }}"
                                        class="text-light">{{ $topCategories->last()->title }}</a>
                                </h2>
                                <h3><a href="{{ route('lolypoly.shopping', ['id' => $topCategories->last()->id]) }}"
                                        class="text-light">{{ $topCategories->last()->productCategory->count() }} Produk
                                        Baru</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5 bg-white">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-lg-12">
                    <div class="text-center">
                        <hr class="section-divider">
                        <h1>Categories</h1>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center flex-wrap">
                @foreach ($categories as $item)
                    <div class="position-relative border-rds-10-prc cat-card p-3 zoom-effect">
                        <a href="{{ route('lolypoly.shopping', ['id' => $item->id]) }}">
                            @if ($item->image != '')
                                <img src="{{ asset($item->image) }}"
                                    class="aspect-ration-one w-100 img-fluid object-fit-cover brightness-50 border-rds-10-prc"
                                    alt="">
                            @else
                                <img src="{{ asset('images/categories/categories-2.png') }}"
                                    class="aspect-ration-one w-100 img-fluid object-fit-cover brightness-50 border-rds-10-prc"
                                    alt="">
                            @endif
                        </a>
                        <div class="centered">
                            <h2 class="text-center"><a href="{{ route('lolypoly.shopping', ['id' => $item->id]) }}"
                                    class="text-light">{{ $item->title }}</a>
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="section w-100 d-flex justify-content-center align-items-center flex-column py-5 px-3"
            style="background: linear-gradient(
                rgba(0, 0, 0, 0.7),
                rgba(0, 0, 0, 0.7)
              ), url({{ asset('images/slider/bg/full-1.png') }})
        no-repeat scroll center center / cover;">
            <h2 class="text-white mb-3">Design Your Own Case</h2>
            <h5 class="text-white text-center w-50 my-1">
                With this innovative tool, you can create a custom phone or tablet case that perfectly reflects your
                personal style. So why settle for a generic case when you can design your own? Start exploring our "Design
                Your Own Case" feature today and unleash your creativity!</h5>
            <h5 class="my-5 zoom-effect"><a href="{{ route('lolypoly.dyoc.index') }}"
                    class="text-white mt-3 border-radius-10 px-5 py-2 border-solid-white"><b>Start Designing<b></a></h5>
        </div>
    </section>
    <section class="mb-5 bg-white">
        <div class="section w-100 d-flex justify-content-center align-items-center flex-column py-5 px-3"
            style="background: linear-gradient(
                rgba(0, 0, 0, 0.7),
                rgba(0, 0, 0, 0.7)
              ), url({{ asset('images/slider/bg/full.png') }})
        no-repeat scroll center center / cover;">
            <h2 class="text-white mb-3">Find Our Store</h2>
            <h5 class="text-white text-center w-50 my-1">
                {{ (new \App\Helpers\GeneralFunction())->generalParameterValue('find_us_text') }}</h5>
            <h5 class="my-5 zoom-effect"><a href="{{ route('lolypoly.find.us') }}"
                    class="text-white mt-3 border-radius-10 px-5 py-2 border-solid-white"><b>Check Store<b></a></h5>
        </div>
    </section>

    @if((new \App\Helpers\GeneralFunction())->generalParameterValue('video') != null)
    <section class="my-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-5">Our Video</div>
                <iframe 
                    class="w-100 h-100"
                    style="min-height:500px; border-radius: 40px" 
                    src="{{ (new \App\Helpers\GeneralFunction())->generalParameterValue('video') }}" 
                    title="Lolypoly Player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>
    @endif

    <section class="my-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="section d-flex align-items-center">
                        <img src="{{ asset('images/about/about-us-image-sample.png') }}" alt=""
                            class="why-us-images object-fit-cover border-radius-10 w-100 img-fluid">
                    </div>
                </div>
                <div class="col-md-7 py-5 px-3">
                    <div class="d-flex justify-content-center align-items-start flex-column h-100">
                        <hr class="section-divider my-4 ms-0">
                        <h2 class="mb-5 text-black">Why Lolypoly?</h2>
                        <h5 class="mb-5">
                            {{ (new \App\Helpers\GeneralFunction())->generalParameterValue('why_us_text') }}
                        </h5>
                        <h5><a href="{{ route('lolypoly.about.us') }}"
                                class="border-custom px-5 py-3 my-5 bg-main text-white blue-button"><b>Read
                                    More<b></a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($promo != [])
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="false" style="background: rgba(0,0,0,0.7);">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-body">
                        <input type="hidden" name="promo_id" id="promoId" value="{{ $promo->id }}">
                        <img src="{{ asset($promo->image) }}" class="img-fluid" alt=""
                            style="min-height:300px;" id="todaysPromo"
                            onclick="addCustomerPromo(`{{ $promo->id }}`)">
                    </div>
                    <div class="modal-footer border-0">
                        <span type="button" class="text-white">*Syarat dan ketentuan berlaku</span>
                        <button type="button" class="static-blue-button ms-auto" data-bs-dismiss="modal">Skip</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#todaysPromo').on('load', function() {
                $('#staticBackdrop').modal('show');
            });
            /* Swiper init */
            var swiper = new Swiper('.swiper', {
                // Optional parameters
                direction: 'horizontal',
                loop: true,

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                // And if we need scrollbar
                scrollbar: {
                    el: '.swiper-scrollbar',
                },
                autoplay: true,
            });
        });

        function addCustomerPromo(id) {
            $.ajax({
                url: '{{ route('promo.addtocustomer') }}',
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    promo_id: id
                },
                dataType: "JSON",
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function success(result) {
                    if (result.code == 200) {
                        $('#staticBackdrop').modal('hide');
                        if (result.redirectTo != '') {
                            swalSuccessRedirect(result);
                        } else {
                            swalSuccess(result);
                        }

                    } else if (result.code == 401) {
                        $('#staticBackdrop').modal('hide');
                        Swal.close();
                        $('#loginModal').modal('show');
                    } else {
                        swalWarning(result);
                    }
                },
                error: function error(result) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Terjadi Kesalahan!",
                    });
                },
            });
        }
    </script>
@endsection
