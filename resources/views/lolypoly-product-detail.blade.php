@extends('lolypoly.app')

@section('content')
    <div class="container pt-5 pb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('lolypoly.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Product Detail</li>
        </ol>
        <div class="row mb-5">
            <div class="col-md-1 col-sm-4 col-4">
                @if ($product->image != '')
                    <img src="{{ asset('' . $product->image . '') }}" alt="Product Image"
                        class="img-fluid w-100 border rounded aspect-ration-one thumb-image mb-2">
                @else
                    <img src="{{ asset('images/product/productx382.png') }}" alt="Product Image alt"
                        class="img-fluid w-100 border rounded aspect-ration-one thumb-image mb-2">
                @endif
                @foreach ($product->productImage as $images)
                    @if ($images->image != '')
                        <img src="{{ asset('' . $images->image . '') }}" alt=""
                            class="img-fluid border rounded aspect-ration-one thumb-image mb-2">
                    @else
                        <img src="{{ asset('images/product/productx382.png') }}" alt=""
                            class="img-fluid border rounded aspect-ration-one thumb-image mb-2">
                    @endif
                @endforeach
            </div>
            <div class="col-md-4 col-sm-8 col-8 mb-3">
                @if ($product->image != '')
                    <img src="{{ asset('' . $product->image . '') }}" alt="Product Image"
                        class="img-fluid w-100 border rounded aspect-ration-one" id="mainImage">
                @else
                    <img src="{{ asset('images/product/productx382.png') }}" alt="Product Image alt"
                        class="img-fluid w-100 border rounded aspect-ration-one" id="mainImage">
                @endif
            </div>
            <div class="col-md-7">
                <h2 class="mb-3"> {{ $product->title }} </h2>
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                    <h2><b id="priceProduct">Rp {{ number_format($product->price, 0, ',', '.') }}</b></h2>
                    <div class="d-flex justify-content-end align-items-center" role="button" id="shareButton"
                        data-bs-toggle="modal" data-bs-target="#shareModal">
                        <img src="{{ asset('images/icons/share-icon.png') }}" alt=""
                            style="height:20px;width:20px;">
                        <h4 class="text-hue" style="margin:0;">Bagikan</h4>
                    </div>
                </div>
                @if (count($product->productType) > 0)
                    <h4>Tipe</h4>
                    <div class="d-flex flex-wrap">
                        @foreach ($product->productType as $type)
                            <h4 class="border rounded my-3 me-2 p-3 btn-product-type" data-id="{{ $type->id }}"
                                data-url="{{ route('lolypoly.product.variant', $type->id) }}"
                                data-price="{{ $type->price }}" role="button">
                                <b>{{ $type->title }}</b>
                            </h4>
                        @endforeach
                    </div>
                @endif
                <div id="list_product_variant">
                </div>
                <form action="{{ Session::has('user') ? route('lolypoly.cart') : route('lolypoly.cart.guest') }}"
                    id="add-to-cart">
                    <h4>Jumlah</h4>
                    <input type="hidden" name="product_stock" id="product_stock" value="1">
                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_variant_id" id="product_variant_id" value="">
                    <input type="hidden" name="product_type_id" id="product_type_id" value="">
                    @if ($product->stock != 0)
                        <div class="d-flex gap-3 my-3">
                            <span class="counter-product-icon minus" role="button">-</span>
                            <span class="counter-product-value value">1</span>
                            <span class="counter-product-icon plus pt-0" role="button"
                                data-max="{{ $product->stock }}">+</span>
                        </div>
                    @else
                        <div class="my-3">
                            <span>Stok Habis!</span>
                        </div>
                    @endif
                    <div class="row mb-4 mt-5">
                        <div class="col-lg-12">
                            @foreach($variant as $item)
                                <div class="badge static-blue-button rounded-pill pt-2 pb-2 pr-4 pl-4 z-depth-0">
                                    <span style="font-size:18px; font-weight: 500">{{ $item->value }}</span>    
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row border-top pt-3">
                        <button type="submit"
                            class="col text-center border-custom p-3 m-2 static-blue-button to-cart-button"
                            id="btn-add-to-cart" {{ count($product->productType) > 0 ? 'disabled' : '' }}
                            {{ $product->stock == 0 ? 'disabled' : '' }}>
                            Masukkan Keranjang
                        </button>
                        <button class="btn border-0 col text-center border-custom p-3 m-2" id="btn-buy"
                            data-address="{{ $user_has_address }}" data-session="{{ Session::has('user') ? 1 : 0 }}"
                            {{ count($product->productType) > 0 ? 'disabled' : '' }}
                            {{ $product->stock == 0 ? 'disabled' : '' }}>Beli Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
        <form action="{{ route('lolypoly.checkout.shipping') }}" method="POST" style="display: none;"
            id="submit-form-buy">
            @csrf
            <input type="hidden" name="id_encode" id="id_encode" value="">
        </form>
        <div class="w-100 border-top border-bottom py-5 mb-3">
            <h3 class="">Deskripsi</h3>
            {!! $product->description !!}
        </div>
    </div>
    <div class="container w-100">
        <h3>Rekomendasi Lainnya</h3>
        <div class="d-flex w-100 justify-content-between overflow-auto" style="max-height:550px; gap:10px;">
            @foreach ($otherProducts as $pr)
                <div class="d-flex flex-column justify-content-start border-hue p-3 my-3 other-product">
                    <a href="{{ route('lolypoly.product.detail', ['id' => encrypt($pr->id)]) }}" class="text-center mb-3">
                        @if ($pr->image != '')
                            <img src="{{ asset('' . $pr->image . '') }}" alt="Product Image"
                                class="img-fluid w-100 rounded aspect-ration-one" style="max-width:384px;">
                        @else
                            <img src="{{ asset('images/product/productx382.png') }}" alt="Product Image alt"
                                class="img-fluid w-100 rounded aspect-ration-one" style="max-width:384px;">
                        @endif
                    </a>
                    <h5 class="text-center"><a
                            href="{{ route('lolypoly.product.detail', ['id' => encrypt($pr->id)]) }}">{{ $pr->title }}</a>
                    </h5>
                    <h5 class="text-center">Rp {{ number_format($pr->price, 0, ',', '.') }}</h5>
                </div>
            @endforeach
        </div>
    </div>
    <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content px-5 py-3">
                <div class="modal-body">
                    <div class="form-title">
                        <div class="d-flex justify-content-between py-3">
                            <h3>Bagikan</h3>
                            <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close" role="button"></i>
                        </div>
                    </div>
                    <div class="row justify-content-md-center gap-3">
                        <div class="col-md-3 text-center">
                            <button class="share-button facebook rounded-circle">
                                <i class="bi bi-facebook fs-5 text-facebook"></i>
                            </button>
                            <h5>Facebook</h5>
                        </div>
                        <div class="col-md-3 text-center">
                            <button class="share-button whatsapp rounded-circle">
                                <i class="bi bi-whatsapp fs-5 text-whatsapp"></i>
                            </button>
                            <h5>Whatsapp</h5>
                        </div>
                        <div class="col-md-3 text-center">
                            <button class="share-button twitter rounded-circle">
                                <i class="bi bi-twitter fs-5 text-twitter"></i>
                            </button>
                            <h5>Twitter</h5>
                        </div>
                        <div class="col-md-3 text-center">
                            <button class="share-button line-chat rounded-circle">
                                <i class="bi bi-line fs-5 text-line"></i>
                            </button>
                            <h5>Line</h5>
                        </div>
                        <div class="col-md-3 text-center">
                            <button class="share-button telegram rounded-circle">
                                <i class="bi bi-telegram fs-5 text-telegram"></i>
                            </button>
                            <h5>Telegram</h5>
                        </div>
                        <div class="col-md-3 text-center">
                            <button class="share-button email-share rounded-circle">
                                <i class="bi bi-envelope-fill fs-5 text-email"></i>
                            </button>
                            <h5>Email</h5>
                        </div>
                        <div class="col-md-3 text-center">
                            <button class="share-button link-share rounded-circle">
                                <i class="bi bi-link-45deg fs-5 text-link"></i>
                            </button>
                            <h5>Link</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.share-button').click(function() {
                // Get the URL of the current page
                const url = window.location.href;

                // Get the social media platform from the button's class name
                const platform = $(this).attr("class").split(/\s+/)[1];

                // Set the URL to share based on the social media platform
                let shareUrl;
                switch (platform) {
                    case 'facebook':
                        shareUrl =
                            `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                        window.open(shareUrl, '_blank');
                        break;
                    case 'twitter':
                        shareUrl = `https://twitter.com/share?url=${encodeURIComponent(url)}`;
                        window.open(shareUrl, '_blank');
                        break;
                    case 'whatsapp':
                        shareUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(url)}`;
                        window.open(shareUrl, '_blank');
                        break;
                    case 'telegram':
                        shareUrl = `https://t.me/share/url?url=${encodeURIComponent(url)}`;
                        window.open(shareUrl, '_blank');
                        break;
                    case 'line-chat':
                        shareUrl = `https://line.me/R/msg/text/?${encodeURIComponent(url)}`;
                        window.open(shareUrl, '_blank');
                        break;
                    case 'email-share':
                        const subject = encodeURIComponent('Check out this link');
                        shareUrl = `mailto:?subject=${subject}&body=${encodeURIComponent(url)}`;
                        window.open(shareUrl, '_blank');
                        break;
                    case 'link-share':
                        navigator.clipboard.writeText(url)
                            .then(() => {
                                alert('URL copied to clipboard.');
                            })
                            .catch((error) => {
                                alert('Failed to copy URL to clipboard:', error);
                            });
                        break;
                }
            });
            $('.thumb-image').click(function() {
                var src = $(this).attr("src");
                $('#mainImage').attr("src", src);
            });
        });
    </script>
@endsection
