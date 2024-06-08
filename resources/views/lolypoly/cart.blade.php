<!-- Start Cart Panel -->
<div class="w-100">
    <div class="p-5">
        <div class="text-center w-100">
            <h1>CHECKOUT</h1>
        </div>
        <div class="mt-4 cart-list">
            @if (count((new \App\Helpers\GeneralFunction())->getCart()->data) > 0)
                @foreach ((new \App\Helpers\GeneralFunction())->getCart()->data as $cart)
                    <div class="cart-item cart-item-{{ $cart->id }}">
                        <div class="row my-5">
                            <div class="col-md-3">
                                <a href="{{ route('lolypoly.product.detail', ['id' => $cart->product_id]) }}">
                                    @if ($cart->product_image != '')
                                        <img class="img-fluid w-100" src="{{ asset('' . $cart->product_image . '') }}"
                                            alt="">
                                    @else
                                        <img class="img-fluid w-100" src="{{ asset('images/product/productx382.png') }}"
                                            alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex justify-content-center flex-column h-100">
                                    <h5 class="align-self-start">
                                        <a href="{{ route('lolypoly.product.detail', ['id' => $cart->product_id]) }}">
                                            {{ $cart->product_name }}
                                        </a>
                                    </h5>
                                    <h5 class="my-3 quantity"><b>{{ $cart->product_price }}</b></h5>
                                    <div class="d-flex gap-3">
                                        <input type="hidden" name="product_id_{{ $cart->id }}"
                                            id="product_id_{{ $cart->id }}" value="{{ $cart->product_id }}">
                                        <input type="hidden" name="product_variant_id_{{ $cart->id }}"
                                            id="product_variant_id_{{ $cart->id }}"
                                            value="{{ $cart->product_varian_id }}">
                                        <input type="hidden" name="product_type_id_{{ $cart->id }}"
                                            id="product_type_id_{{ $cart->id }}"
                                            value="{{ $cart->product_type_id }}">
                                        <span class="counter-icon cart-minus"
                                            data-url="{{ Session::has('user') ? route('lolypoly.cart.addQty') : route('lolypoly.cart.addQtyGuest') }}"
                                            data-id="{{ $cart->id }}" role="button">-</span>
                                        <span class="counter-value cart-stock" id="{{ $cart->id }}"
                                            data-value="{{ $cart->stock }}">{{ $cart->stock }}</span>
                                        <span class="counter-icon cart-plus"
                                            data-url="{{ Session::has('user') ? route('lolypoly.cart.addQty') : route('lolypoly.cart.addQtyGuest') }}"
                                            data-id="{{ $cart->id }}" role="button"
                                            data-max="{{ $cart->product ? $cart->product->stock : $cart->stock }}">+</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <span class="btn btn-danger cart-delete" data-url="{{ route('lolypoly.cart.delete') }}"
                                    data-id="{{ $cart->id }}" role="button"><i
                                        class="fa-solid fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        @if (count((new \App\Helpers\GeneralFunction())->getCart()->data) > 0)
            <div class="d-flex justify-content-between">
                <h5>Subtotal:</h5>
                <h5><b id="cart_total">{{ (new \App\Helpers\GeneralFunction())->getCart()->total }}</b></h5>
            </div>
        @endif
        <div
            class="d-flex align-items-center justify-content-center  {{ count((new \App\Helpers\GeneralFunction())->getCart()->data) <= 0 ? 'd-none' : '' }}">
            <a href="{{ Session::has('user') ? route('lolypoly.shipping') : route('lolypoly.checkout') }}"
                class="my-3 border-custom text-white bg-main py-3 px2 blue-button text-center w-100">Checkout</a>
        </div>
    </div>
</div>
<!-- End Cart Panel -->
