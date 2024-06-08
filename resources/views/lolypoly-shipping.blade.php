<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('lolypoly.head')
</head>

<body>
    <div class="">
        <div style="background: white">
            <div class="row">
                <div class="col p-5">
                    <div class="have-user">
                        <label class="form-label" for="">
                            <h2>Customer Information</h2>
                        </label>
                        <div class="form-group">
                            <label class="form-label" for="">
                                <h5 class="text-bland">Customer Name</h5>
                                <h5>{{ $user->name }}</h5>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">
                                <h5 class="text-bland">Customer Phone</h5>
                                <h5>{{ $user->phone_number }}</h5>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">
                                <h5 class="text-bland">Address <span class="txt-color-main" id="changeAddress"
                                        data-bs-toggle="modal" data-bs-target="#changeAddressModal">(Change)</span></h5>
                                <h5 id="userAddress">{{ $address->first()->name }} -
                                    {{ $address->first()->address }},
                                    {{ ucwords(strtolower($address->first()->kelurahanDesa->kelurahan_desa_name)) }},
                                    {{ ucwords(strtolower($address->first()->kecamatan->kecamatan_name)) }},
                                    {{ ucwords(strtolower($address->first()->kabupatenKota->kabupaten_kota_name)) }},
                                    {{ ucwords(strtolower($address->first()->provinsi->provinsi_name)) }}, {{ $address->first()->kode_pos }}
                                </h5>
                            </label>
                        </div>
                        <label class="form-label" for="">
                            <h2>Order Method</h2>
                        </label>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-center">
                                        <div
                                            class="d-flex align-items-center justify-content-center border-custom bg-main">
                                            <a href="#" class="py-3 px-5 w-100 store-method static-blue-button">
                                                Pick Up Store</a>
                                        </div>
                                    </h5>
                                </div>
                                <div class="col">
                                    <h5 class="text-center">
                                        <!-- JANGAN LUPA HILANGKAN STYLE JIKA SHIPPING SUDAH TERINTEGRASI -->
                                        <div class="d-flex align-items-center justify-content-center border-custom" style="border: 1px solid #888888;"> 
                                            <button href="#" class="py-3 px-5 w-100 delivery-method" id="delivery-method" style="border-radius: 10px;background: #fff;border: none;"> 
                                                Delivery</button>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div id="deliveryDiv" class="dp-none">
                            <label class="form-label" for="">
                                <h2>Choose Delivery</h2>
                            </label>
                            <div id="delivery-pricing">
                            </div>
                        </div>
                        <div id="storeDiv">
                            <label class="form-label" for="">
                                <h2>Choose Store</h2>
                            </label>
                            <div class="form-group">
                                <select name="pick_up_store" id="pick_up_store" class="form-control select-form">
                                    <option value="">-- Pilih Store --</option>                                        
                                    @foreach ($stores as $store)
                                    <option value="{{$store->id}}">{{$store->title}}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <h5>
                                <div class="d-flex align-items-center justify-content-start">
                                    <a href="{{ route('lolypoly.home') }}" class="py-3">
                                        < Return to cart</a>
                                </div>
                            </h5>
                        </div>
                        <div class="col">
                            <h5 class="text-right">
                                <div class="d-flex align-items-center justify-content-end">
                                    <form method="POST" action="{{ route('lolypoly.payment') }}" id="submit-form-payment">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ (new \App\Helpers\GeneralFunction())->myId() }}">
                                        <input type="hidden" name="shipping_method" id="shipping_method" value="pckptstr">
                                        <input type="hidden" name="store_id" id="store_id" value="">
                                        <input type="hidden" name="customer_address_id" id="customer_address_id" value="{{ $address->first()->id }}">
                                        <input type="hidden" name="promo_id" id="promo_id" value="">
                                        <input type="hidden" name="cart_delivery_id" id="cart_delivery_id" value="">
                                        
                                        <button type="submit"
                                            class="border-custom text-white bg-main py-3 px-5 blue-button" id="btn-submit">Continue
                                            Payment</button>
                                        <!-- <a href="{{ route('email-payment') }}"
                                        class="border-custom text-white bg-main py-3 px-5 blue-button">Continue
                                        email</a> -->
                                    </form>
                                </div>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col p-5" style="background: #FAFAFA;">
                    <div class="list-cart">

                        @foreach ($carts->data as $cart)
                            <div class="item-cart">
                                <div class="row my-2">
                                    <div class="col-md-2">
                                        <img src="{{ $cart->product_image }}" alt="product images" class="img-fluid">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="d-flex justify-content-center flex-column h-100">
                                            <h5 class="align-self-start">
                                                {{ $cart->product_name }}
                                            </h5>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <table>
                                                        <tr>
                                                            <td>Berat</td>
                                                            <td style="padding: 0 10px;">:</td>
                                                            <td>{{ $cart->product_weight }} Gram</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Quantity</td>
                                                            <td style="padding: 0 10px;">:</td>
                                                            <td>{{ $cart->stock }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-2">
                                                    <h7 class="my-3 quantity text-end">
                                                        <b>{{ $cart->product_price }}</b>
                                                    </h7>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-2"
                                    style="border-top:1px solid #ccc;border-bottom:1px solid #ccc; padding-top:15px;margin-bottom:15px;">
                                    <div class="col-md-9">
                                        <div class="sub-total">
                                            <h5 class="">Sub Total</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="quantity text-end"><b>{{ $cart->sub_total_price }}</b> </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control checkout-form" name=""
                                    id="" placeholder="Enter Gift Code">
                            </div>
                            <div class="col-md-2">
                                <h5 class="text-center grey-button h-100 position-relative">
                                    <a href="#" class="centered">Apply</a>
                                </h5>
                            </div>
                        </div>
                    </div> -->
                    <div class="container border-black bg-white py-3 {{ (count($data_promo) > 0) ? ''  : 'd-none'}}">
                        <h5 class="text-hue">Enter Gift Code</h5>
                        @foreach($data_promo as $promo)
                            <div class="container border p-3 my-3 border-radius-10 btn-promo" data-id="{{ $promo->id }}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-center flex-column h-100 ps-3">
                                        <h5 class="mb-4">Diskon {{ $promo->disc_value }}</h5>
                                        <p>Berlaku sampai dengan {{ (new \App\Helpers\GeneralFunction())->tgl_indo($promo->end_date) }}</p>
                                    </div>
                                    <div class="p-3">
                                        <h5 class="p-3 text-main border-custom btn-promo-detail" style="margin: 0;">Lihat Detail</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row my-2">
                        <div class="col">
                            <h5> Subtotal </h5>
                        </div>
                        <div class="col">
                            <h5 class="text-end"> {{ $carts->total }} </h5>
                        </div>
                    </div>
                    <div class="row my-2" id="data-discount">
                        <div class="col">
                            <h5> Discount (-) </h5>
                        </div>
                        <div class="col">
                            <h5 class="text-end disount-value"> Rp 0 </h5>
                        </div>
                    </div>
                    <div class="row my-2" id="data-shipping">
                        <div class="col">
                            <h5> Shipping </h5>
                        </div>
                        <div class="col">
                            <h5 class="text-end" id="shipping-price"> Rp 0 </h5>
                            <input type="hidden" id="input-shipping-price" value="0">
                        </div>
                    </div>
                    <hr>
                    <div class="row my-2">
                        <div class="col">
                            <h5> Total </h5>
                        </div>
                        <div class="col">
                            <h5 class="text-end total-value"> {{ $carts->total }} </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="changeAddressModal" role="dialog" aria-labelledby="changeAddressModal"
        aria-hidden="true" style="width: ">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-5">
                <div class="modal-body">
                    <div class="form-title">
                        <div class="d-flex justify-content-between py-3">
                            <h3>Pilih Alamat Pengiriman</h3>
                        </div>
                    </div>
                    <div class="">
                        <select name="address_select" id="addressSelect"
                            class="form-control checkout-form select-form">
                            @foreach ($address as $adrs)
                                <option data-item="{{ $adrs->name }} -
                                    {{ $adrs->address }},
                                    {{ ucwords(strtolower($adrs->kelurahanDesa->kelurahan_desa_name)) }},
                                    {{ ucwords(strtolower($adrs->kecamatan->kecamatan_name)) }},
                                    {{ ucwords(strtolower($adrs->kabupatenKota->kabupaten_kota_name)) }},
                                    {{ ucwords(strtolower($adrs->provinsi->provinsi_name)) }}, {{ $adrs->kode_pos }}"
                                    value="{{ $adrs->id }}">
                                    {{ $adrs->name }} -
                                    {{ $adrs->address }},
                                    {{ ucwords(strtolower($adrs->kelurahanDesa->kelurahan_desa_name)) }},
                                    {{ ucwords(strtolower($adrs->kecamatan->kecamatan_name)) }},
                                    {{ ucwords(strtolower($adrs->kabupatenKota->kabupaten_kota_name)) }},
                                    {{ ucwords(strtolower($adrs->provinsi->provinsi_name)) }}, {{ $adrs->kode_pos }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Body main wrapper end -->
    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        $('.select-form').select2({
            minimumResultsForSearch: -1,
            width: '100%',
        });
        $('.select2-area').select2();
        
        $(document).on("click", ".store-method", function (e) {
            e.preventDefault();
            storeMethod();
        });
        
        function storeMethod(){
            $('.store-method').addClass('static-blue-button');
            $('.store-method').parent().addClass('bg-main');
            $('.delivery-method').removeClass('static-blue-button');
            $('.delivery-method').parent().removeClass('bg-main');
            $('#deliveryDiv').addClass('dp-none');
            $('#storeDiv').removeClass('dp-none');
            $('#shipping_method').val("pckptstr");
        }

        $(document).on("click", ".delivery-method", function (e) {
            e.preventDefault();
            $(this).addClass('static-blue-button');
            $(this).parent().addClass('bg-main');
            $('.store-method').removeClass('static-blue-button');
            $('.store-method').parent().removeClass('bg-main');
            $('#deliveryDiv').removeClass('dp-none');
            $('#storeDiv').addClass('dp-none');
        });

        $('#addressSelect').change(function() {
            var selectedOption = $(this).find('option:selected');
            $('#userAddress').html(selectedOption.data('item'));
            $('#customer_address_id').val(selectedOption.val());
            $('#changeAddressModal').modal('hide');
            storeMethod();
        });
        
        $("#pick_up_store").change(function(e){
            e.preventDefault();
            $('#store_id').val($(this).val());
        });

        $("#btn-submit").click(function(e){
            e.preventDefault();
            if($('#store_id').val() == '' && $('#shipping_method').val() == 'pckptstr'){
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Silahkan Pilih Store Terlebih Dahulu',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            } else {
                $('#submit-form-payment').submit();
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on("click", ".btn-promo", function (e) {
            e.preventDefault();
            $(".btn-promo").removeClass("btn-promo-active");
            $(this).addClass("btn-promo-active");
            var id = $(this).data("id");
            $('#promo_id').val(id);
            calculate();
        });
        
        $(document).on("click", "#delivery-method", function (e) {
            e.preventDefault();
            $('.delivery-item').remove();
            var address_id = $('#customer_address_id').val();
            var url_delivery = "{{ url('/delivery') }}"+'/'+address_id;
            $.ajax({
                url: url_delivery,
                type: "GET",
                // headers: {
                //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                // },
                // data: dataForm,
                // dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function success(result) {
                    // console.log(result);
                    if (result.code == 200) {
                        var delivery_data = result.data;
                        // console.log(delivery_data);
                        if(delivery_data.code == '20001003'){
                            var delivery_pricing = delivery_data.pricing;
                            var delivery_html = '';
                            delivery_pricing.forEach(function (dev_data) {
                                console.log(dev_data);
                                delivery_html += '<div class="d-flex justify-content-between border-custom p-3 delivery-option delivery-item mb-3" data-id="'+dev_data.id+'">';
                                delivery_html += '<h5>'+dev_data.courier_name+' '+dev_data.courier_service_name+' ('+dev_data.duration+')</h5>';
                                delivery_html += '<h5>'+formatRupiah(dev_data.price)+'</h5>';
                                delivery_html += '</div>';
                            });
                            $("#delivery-pricing").html(delivery_html);
                            // console.log(delivery_pricing);
                            swal.close();
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: delivery_data.message,
                                icon: "warning",
                                allowOutsideClick: false,
                                confirmButtonColor: "#4395d1",
                            }).then(function (result) {
                                storeMethod();
                            });
                        }
                    } else {
                        Swal.fire({
                            title: "Gagal",
                            html: result.message,
                            icon: "warning",
                            allowOutsideClick: false,
                            confirmButtonColor: "#4395d1",
                        }).then(function (result) {
                            storeMethod();
                        });
                    }
                },
                error: function error(result) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Terjadi Kesalahan!",
                    }).then(function (result) {
                        storeMethod();
                    });
                },
            });
        });
        
        $(document).on("click", ".delivery-item", function (e) {
            e.preventDefault();
            $('.delivery-option').each(function() {
                $(this).removeClass('delivery-set');
            })
            $(this).addClass('delivery-set');
            var id = $(this).data('id');
            $('#cart_delivery_id').val(id);
            calculate();
        });

        function calculate(){
            var promo_id = $('#promo_id').val();
            var cart_delivery_id = $('#cart_delivery_id').val();
            $.ajax({
                url: "{{ route('lolypoly.delivery.calculate') }}",
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data:  {
                    promo_id: promo_id,
                    cart_delivery_id: cart_delivery_id,
                },
                dataType: "JSON",
                // contentType: false,
                // cache: false,
                processData: true,
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function success(result) {
                    console.log(result);
                    if (result.code == 200) {
                        swal.close();
                        var shipping_price = result.data.price;
                        $('.disount-value').text(result.data.discount);
                        $('#shipping-price').text(result.data.delivery);
                        $('.total-value').text(result.data.total);
                        if(result.data.pass_promo == "1"){
                            $('#shipping_method').val(cart_delivery_id);
                        }
                    } else {
                        Swal.fire({
                            title: "Gagal",
                            html: result.message,
                            icon: "warning",
                            allowOutsideClick: false,
                            confirmButtonColor: "#4395d1",
                        }).then(function (res) {
                            if(result.data.pass_promo == "0"){
                                resetPromo();
                            }
                            if(result.data.pass_delivery == "0"){
                                storeMethod();
                            }
                            $('.disount-value').text(result.data.discount);
                            $('#shipping-price').text(result.data.delivery);
                            $('.total-value').text(result.data.total);
                        });
                    }
                },
                error: function error(result) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Terjadi Kesalahan!",
                    }).then(function (res) {
                        storeMethod();
                        resetPromo();
                    });
                },
            });
        }
        function formatRupiah(number) {
            const formatter = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            });

            return formatter.format(number);
        }

        function resetPromo(){
            $(".btn-promo").removeClass("btn-promo-active");
            $('#promo_id').val("");
        }
    </script>
</body>

</html>
