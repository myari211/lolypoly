<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('lolypoly.head')
</head>

<body>
    <div id="checkout-page">
        <div style="background: white">
            <div class="row">
                <div class="col p-5">
                    <form action="{{ route('lolypoly.checkout.store') }}" id="submit-form">
                        <div class="no-user">
                            <label class="form-label mb-3" for="">
                                <h2>Customer Information</h2>
                            </label>
                            <div class="form-group mb-3">
                                <label class="form-label" for="customer_name">
                                    <h6>Name</h6>
                                </label>
                                <input type="text" class="form-control checkout-form" name="customer_name"
                                    id="customer_name" placeholder="Enter Your Name" data-validation="required">
                            </div>
                            <div class="form-group my-3">
                                <label class="form-label" for="customer_phone">
                                    <h6>Phone</h6>
                                </label>
                                <input type="text" class="form-control checkout-form" name="customer_phone"
                                    id="customer_phone" placeholder="Enter Your Phone" data-validation="required">
                            </div>
                            <div class="form-group my-3">
                                <label class="form-label" for="customer_email">
                                    <h6>Email</h6>
                                </label>
                                <input type="text" class="form-control checkout-form" name="customer_email"
                                    id="customer_email" placeholder="Enter Your Email" data-validation="required">
                            </div>
                            <label class="form-label mb-3" for="">
                                <h2>Customer Address</h2>
                            </label>
                            <div class="form-group mb-3">
                                <label class="form-label" for="address_name">
                                    <h6>Nama</h6>
                                </label>
                                <input type="text" class="form-control checkout-form" name="address_name"
                                    id="address_name" placeholder="Enter Your Name" data-validation="required">
                            </div>
                            <div class="form-group my-3">
                                <label class="form-label" for="address">
                                    <h6>Alamat Lengkap</h6>
                                </label>
                                <input type="text" class="form-control checkout-form" name="address" id="address"
                                    placeholder="Enter Your Address" data-validation="required">
                            </div>
                            <div class="form-group my-3">
                                <label class="form-label" for="provinsi">
                                    <h6>Provinsi</h6>
                                </label>
                                <select name="provinsi" id="provinsi" class="form-control checkout-form"
                                    data-validation="required">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinsi as $prov)
                                        <option value="{{ $prov->provinsi_id }}">{{ $prov->provinsi_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group my-3">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label" for="kabupatenKota">
                                            <h6>Kabupaten / Kota</h6>
                                        </label>
                                        <select name="kabupatenKota" id="kabupatenKota"
                                            class="form-control checkout-form" data-validation="required" disabled>
                                            <option value=""selected disabled>Pilih Kabupaten / Kota</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="form-label" for="kecamatan">
                                            <h6>Kecamatan</h6>
                                        </label>
                                        <select name="kecamatan" id="kecamatan" class="form-control checkout-form"
                                            data-validation="required" disabled>
                                            <option value=""selected disabled>Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-3">
                                <label class="form-label" for="kelurahanDesa">
                                    <h6>Kelurahan / Desa</h6>
                                </label>
                                <select name="kelurahanDesa" id="kelurahanDesa" class="form-control checkout-form"
                                    data-validation="required" disabled>
                                    <option value=""selected disabled>Pilih Kelurahan / Desa</option>
                                </select>
                            </div>
                            <div class="form-group my-3">
                                <label class="form-label" for="postal_code">
                                    <h6>Kode Pos</h6>
                                </label>
                                <input type="text" class="form-control checkout-form" name="postal_code"
                                    id="postal_code" placeholder="Enter Your Postal Code" data-validation="required">
                            </div>
                            <div class="form-group my-3">
                                <label class="form-label" for="address_phone_number">
                                    <h6>Phone Number</h6>
                                </label>
                                <input type="text" class="form-control checkout-form" name="address_phone_number"
                                    id="address_phone_number" placeholder="Enter Your Phone Number"
                                    data-validation="required">
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col">
                                <h6>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <a href="{{ route('lolypoly.home') }}" class="py-3">
                                            < Return to cart </a>
                                    </div>
                                </h6>
                            </div>
                            <div class="col">
                                <h6 class="text-right">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <button type="submit"
                                            class="border-custom text-white bg-main py-3 px-5 blue-button">Continue
                                            Shipping</button>
                                    </div>
                                </h6>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col p-5" style="background: #FAFAFA;">
                    @foreach ($carts->data as $cart)
                        <div class="item-cart">
                            <div class="row my-2">
                                <div class="col-md-2">
                                    <img src="{{ $cart->product_image }}" alt="product images" class="img-fluid">
                                </div>
                                <div class="col-md-10">
                                    <div class="d-flex justify-content-center flex-column h-100">
                                        <h6 class="align-self-start">
                                            {{ $cart->product_name }}
                                        </h6>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <span class="">Quantity : {{ $cart->stock }}</span>
                                            </div>
                                            <div class="col-md-2">
                                                <h6 class="my-3 quantity text-end"><b>{{ $cart->product_price }}</b>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2"
                                style="border-top:1px solid #ccc;border-bottom:1px solid #ccc; padding-top:15px;margin-bottom:15px;">
                                <div class="col-md-9">
                                    <div class="sub-total">
                                        <h6 class="">Sub Total</h6>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="quantity text-end"><b>{{ $cart->sub_total_price }}</b> </h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control checkout-form" name=""
                                    id="" placeholder="Enter Gift Code">
                            </div>
                            <div class="col-md-2">
                                <h6 class="text-center grey-button h-100 position-relative">
                                    <a href="#" class="centered">Apply</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="container border-black bg-white py-3 dp-none">
                        <h6 class="text-hue">Enter Gift Code</h6>
                        <div class="container border p-3 my-3 border-radius-10">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-center flex-column h-100 ps-3">
                                    <h6 class="mb-4">Diskon Rp300.000</h6>
                                    <p>Berlaku sampai dengan 30 April</p>
                                </div>
                                <div class="p-3">
                                    <h6 class="p-3 text-main border-custom" style="margin: 0;">Lihat Detail</h6>
                                </div>
                            </div>
                        </div>
                        <div class="container border p-3 my-3 border-radius-10">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-center flex-column h-100 ps-3">
                                    <h6 class="mb-4">Diskon Rp500.000</h6>
                                    <p>Berlaku sampai dengan 30 April</p>
                                </div>
                                <div class="p-3">
                                    <h6 class="p-3 text-main border-custom" style="margin: 0;">Lihat Detail</h6>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <hr>
                    <div class="row my-2">
                        <div class="col">
                            <h6> Subtotal </h6>
                        </div>
                        <div class="col">
                            <h6 class="text-end"> {{ $carts->total }} </h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row my-2">
                        <div class="col">
                            <h6> Total </h6>
                        </div>
                        <div class="col">
                            <h6 class="text-end"> Rp 150.000 </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('lolypoly.foot')

    <script>
        $('.select-form').select2({
            minimumResultsForSearch: -1,
        });
        $('.select2-area').select2();
        $('.store-method').click(function(e) {
            e.preventDefault();
            $(this).addClass('static-blue-button');
            $(this).parent().addClass('bg-main');
            $('.delivery-method').removeClass('static-blue-button');
            $('.delivery-method').parent().removeClass('bg-main');
            $('#deliveryDiv').addClass('dp-none');
            $('#storeDiv').removeClass('dp-none');
        });
        $('.delivery-method').click(function(e) {
            e.preventDefault();
            $(this).addClass('static-blue-button');
            $(this).parent().addClass('bg-main');
            $('.store-method').removeClass('static-blue-button');
            $('.store-method').parent().removeClass('bg-main');
            $('#deliveryDiv').removeClass('dp-none');
            $('#storeDiv').addClass('dp-none');
        });
        $('.delivery-option').click(function(e) {
            e.preventDefault();
            $('.delivery-option').each(function() {
                $(this).removeClass('delivery-set');
            })
            $(this).addClass('delivery-set');
        })
        $('#provinsi').change(function() {
            getKabupatenKotaData('#kabupatenKota', {
                provinsi_id: $(this).val()
            });
            $('#kabupatenKota').find("option").remove()
            $('#kabupatenKota').append(
                '<option value="" disabled selected>Pilih Kabupaten / Kota</option>'
            ).prop("disabled", true);

            $('#kecamatan').find("option").remove()
            $('#kecamatan').append(
                '<option value="" disabled selected>Pilih Kecamatan</option>'
            ).prop("disabled", true);

            $('#kelurahanDesa').find("option").remove()
            $('#kelurahanDesa').append(
                '<option value="" disabled selected>Pilih Kelurahan / Desa</option>'
            ).prop("disabled", true);
        });
        $('#kabupatenKota').change(function() {
            getKecamatanData('#kecamatan', {
                kabupaten_kota_id: $(this).val()
            });
            $('#kecamatan').find("option").remove()
            $('#kecamatan').append(
                '<option value="" disabled selected>Pilih Kecamatan</option>'
            ).prop("disabled", true);

            $('#kelurahanDesa').find("option").remove()
            $('#kelurahanDesa').append(
                '<option value="" disabled selected>Pilih Kelurahan / Desa</option>'
            ).prop("disabled", true);
        });
        $('#kecamatan').change(function() {
            getKelurahanDesaData('#kelurahanDesa', {
                kecamatan_id: $(this).val()
            });
            $('#kelurahanDesa').find("option").remove()
            $('#kelurahanDesa').append(
                '<option value="" disabled selected>Pilih Kelurahan / Desa</option>'
            ).prop("disabled", true);
        });
    </script>
</body>

</html>
