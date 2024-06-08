@extends('lolypoly.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-2 mb-3">
                <div class="border-custom">
                    <ul class="py-3 mb-0">
                        <li class="account-listing-active profil_account mb-3">
                            <h5><b>Profil</b></h5>
                        </li>
                        <li class="account-listing password_account mb-3">
                            <h5><b>Kata Sandi</b></h5>
                        </li>
                        <li class="account-listing history_account mb-3">
                            <h5><b>Riwayat Pesanan</b></h5>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <a href="#" class="py-3 d-none mb-3 txt-color-main" id="detailHref">
                    <div class="mb-3"> <span class="h5 mb-3">
                            < Kembali ke Halaman Sebelumnya</span>
                    </div>
                </a>
                <div class="border-custom section">
                    <div class="profil-section p-3">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="d-flex justify-content-center my-5 flex-column">
                                    <img src="{{ asset('' . $user->image . '') }}" class="rounded-circle m-auto img-fluid"
                                        style="aspect-ratio:1/1;height:200px;" id="profilePictImage">
                                    <div class="text-center">
                                        <form id="profilePictForm" enctype="multipart/form-data">
                                            <label for="profilePict" class="text-center my-3 p-2"><b
                                                    class="border-custom txt-color-main p-2">Pilih Foto</b></label>
                                            <input id="profilePict" style="display:none;" type="file"
                                                name="images_thumbnail" accept="image/*">
                                        </form>
                                    </div>
                                    <p class="text-center">Format file jpg, jpeg, png.</p>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3 p-3">
                                            <h2>Biodata</h2>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <a href="#"
                                                    class="my-3 border-custom text-white bg-main p-2 blue-button change_bio_button">Ubah
                                                    Biodata</a>
                                                <a href="#"
                                                    class="my-3 border-custom text-white bg-main p-2 blue-button save_bio_button dp-none"
                                                    data-id="{{ encrypt($user->id) }}">Simpan
                                                    Biodata</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container my-2">
                                    <div class="row">
                                        <div class="col-md-3 p-3">
                                            <h5 class="">Nama</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <input type="text" class="form-control account-form"
                                                    value="{{ $user->name }}" id="bioName" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container my-2">
                                    <div class="row">
                                        <div class="col-md-3 p-3">
                                            <h5 class="">Tanggal Lahir</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <input type="date" class="form-control account-form" id="bioDate"
                                                    value="{{ $user->dob }}" max="<?= date('Y-m-d') ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container my-2">
                                    <div class="row">
                                        <div class="col-md-3 p-3">
                                            <h5 class="">Jenis Kelamin</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <select name="gender" class="form-control account-form select-form"
                                                    id="bioGender" disabled>
                                                    <option value="" disabled>Select a gender</option>
                                                    <option value="L" {{ $user->gender == 'L' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="P" {{ $user->gender == 'P' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container my-2">
                                    <div class="row">
                                        <div class="col-md-3 p-3">
                                            <h5 class="">Email</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <input type="text" class="form-control account-form" id="bioEmail"
                                                    value="{{ $user->email }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container my-2">
                                    <div class="row">
                                        <div class="col-md-3 p-3">
                                            <h5 class="">Nomor Handphone</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <input type="text" class="form-control account-form" id="bioNumber"
                                                    value="{{ $user->phone_number }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="container my-2">
                                    <div class="row">
                                        <div class="col-md-3 p-3">
                                            <h2>Alamat</h2>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex align-items-center justify-content-end"
                                                data-bs-toggle="modal" data-bs-target="#addressModal">
                                                <a href="#"
                                                    class="my-3 border-custom text-white bg-main p-2 blue-button">Tambah
                                                    Alamat Baru</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container my-2 address-list">
                                    @foreach ($customerAddress as $address)
                                        <div class="row" id="row-{{ $address->id }}">
                                            <div class="col-md-3 py-1 px-3">
                                                <h5 class="" id="title-{{ $address->id }}">Alamat
                                                    {{ $address->name }}
                                                </h5>
                                                <div class="d-flex gap-3">
                                                    <p class="txt-color-main edit-address"
                                                        data-addressId="{{ $address->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#addressEditModal">Ubah</p>
                                                    <p class="text-danger delete-address"
                                                        data-addressId="{{ $address->id }}">Hapus</p>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <input type="text" class="form-control account-form text-wrap"
                                                        id="{{ $address->id }}"
                                                        value="{{ $address->name }} - {{ $address->phone_number }} - {{ $address->address }}, {{ $address->kode_pos }}, {{ ucwords(strtolower($address->kelurahanDesa->kelurahan_desa_name)) }}, {{ ucwords(strtolower($address->kecamatan->kecamatan_name)) }},  {{ ucwords(strtolower($address->kabupatenKota->kabupaten_kota_name)) }}, {{ ucwords(strtolower($address->provinsi->provinsi_name)) }}"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="password-section p-3 dp-none">
                        <div class="container my-3">
                            <h2>Ubah Kata Sandi</h2>
                        </div>
                        <form id="update-password-form" action="{{ route('change.password') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                            <div class="container my-2">
                                <div class="row">
                                    <div class="col-md-3 p-3">
                                        <h5 class="">Kata Sandi Sebelumnya</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <input type="password" id="current_password" name="current_password"
                                                class="form-control account-form" value=""
                                                placeholder="Masukkan Kata Sandi Sebelumnya" data-validation="required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container my-2">
                                <div class="row">
                                    <div class="col-md-3 p-3">
                                        <h5 class="">Kata Sandi Baru</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <input type="password" name="new_password" id="new_password"
                                                class="form-control account-form" value=""
                                                placeholder="Masukkan Kata Sandi Baru" data-validation="required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container my-2">
                                <div class="row">
                                    <div class="col-md-3 p-3">
                                        <h5 class="">Konfirmasi Kata Sandi</h5>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <input type="password" id="confirm_password" name="confirm_password"
                                                class="form-control account-form" value=""
                                                placeholder="Konfirmasi Kata Sandi" data-validation="required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container my-2">
                                <div class="row">
                                    <div class="col-md-3 p-3">

                                    </div>
                                    <div class="col-md-9">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <button type="submit"
                                                class="my-3 border-custom text-white bg-main p-2 blue-button">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="history-section p-3 dp-none">
                        <div class="container my-3">
                            <div class="row">
                                <div class="col-md-10">
                                    <h2>Riwayat Pesanan</h2>
                                </div>
                                <div class="col-md-2">
                                    <form action="" id="filterTransaction">
                                        <div class="form-group">
                                            <select name="status" id="orderingValue"
                                                class="form-control account-form select-form">
                                                <option value="">Semua Status</option>
                                                @foreach ($status as $st)
                                                    <option value="{{ $st->id }}">{{ $st->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <input type="hidden" id="transactionFiltervalue" name="">
                            <table id="transactionHistory" class="w-100">
                                <tbody> </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="detail-section p-3 dp-none">
                        <div class="row p-3">
                            <div class="col-md-10">
                                <h3 id="transaction-id">#XYNHSDI3092</h3>
                                <h5 class="text-hue" id="transaction-created-at">Order dibuat: 19 Juni 2023</h5>
                            </div>
                            <div class="col-md-2">
                                <div class="pending-status text-center py-2 px-3 rounded-pill">
                                    <span id="transactionStatus">
                                        Dikirim
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12 pickUpStore d-none">
                                <h5 for=""><b>Store Information</b></h5>
                                <label for=""><b>Name : </b></label><br>
                                <span id="storeName"></span><br>
                                <label for=""><b>Address : </b></label><br>
                                <span id="storeAddress"></span><br>
                                <label for=""><b>Phone Number : </b></label><br>
                                <span id="storePhoneNumber"></span><br>
                            </div>
                        </div>
                        <div class="shippingProgress d-none d-flex w-100 flex-wrap">
                            <div class="flex-basis-20 d-flex flex-column justify-content-start p-3">
                                <div class="mini-progress-bar-active mb-2"></div>
                                <span class="mb-2 text-center" id="verifiedTitle">Pembayaran Telah di Verifikasi</span>
                                <span class="text-hue text-center" id="verifiedTime">12 Jun 2023, 07:55 WIB</span>
                            </div>
                            <div class="flex-basis-20 d-flex flex-column justify-content-start p-3">
                                <div class="mini-progress-bar-active mb-2"></div>
                                <span class="mb-2 text-center" id="proccessTitle">Pesanan Sedang Di proses</span>
                                <span class="text-hue text-center" id="proccessTime">12 Jun 2023, 07:55 WIB</span>
                            </div>
                            <div class="flex-basis-20 d-flex flex-column justify-content-start p-3">
                                <div class="mini-progress-bar-active mb-2"></div>
                                <span class="mb-2 text-center" id="pickupTitle">Menunggu Pickup</span>
                                <span class="text-hue text-center" id="pickupTime">12 Jun 2023, 07:55 WIB</span>
                            </div>
                            <div class="flex-basis-20 d-flex flex-column justify-content-start p-3">
                                <div class="mini-progress-bar-active mb-2"></div>
                                <span class="mb-2 text-center" id="sentTitle">Pesanan Dikirim</span>
                                <span class="text-hue text-center" id="sentTime">12 Jun 2023, 07:55 WIB</span>
                            </div>
                            <div class="flex-basis-20 d-flex flex-column justify-content-start p-3">
                                <div class="mini-progress-bar-inactive mb-2"></div>
                                <span class="mb-2 text-center" id="arrivedTitle">Pesanan Sampai</span>
                                <span class="text-white text-center" id="arrivedTime">-</span>
                            </div>
                        </div>
                        <div class="p-3 border-top">
                            <h4 class="mb-3">Info Pengiriman</h4>
                            <div class="row">
                                <div class="col-md-2">
                                    Alamat:
                                </div>
                                <div class="col-md-4">
                                    <h6 id="addressName">-</h6>
                                    <h6 class="text-hue" id="transactionPhoneNumber">-</h6>
                                    <h6 class="text-hue" id="transactionAddress">-</h6>
                                </div>
                                <div class="col-md-6">
                                    <button class="my-3 border-custom text-white bg-main p-2 blue-button float-end" id="pickedUpBtn">Sudah di Pick Up</button>
                                </div>
                            </div>
                        </div>
                        <div class="border-top p-3">
                            <h3>Detail Produk</h3>
                            <div class="border-bottom mb-3 pb-3" id="productList">

                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Metode Pembayaran</span>
                                <span id="paymentMethod">-</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-hue">Total Harga Barang</span>
                                <span id="totalTransaction">Rp. 0</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-hue">Diskon</span>
                                <span id="discountTransaction">Rp. 0</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-hue">Biaya Pengiriman</span>
                                <span id="shippingCost">Rp. 0</span>
                            </div>
                            <div class="d-flex justify-content-between mt-5 mb-3">
                                <span class="text-hue"><b>Total Pesanan</b></span>
                                <span id="overallTransaction">Rp. 0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content p-5">
                <div class="modal-body">
                    <div class="form-title">
                        <div class="d-flex justify-content-between py-3">
                            <h3>Tambah Alamat Baru</h3>
                        </div>
                    </div>
                    <div class="">
                        <form class="address">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Label</label>
                                        <input type="text" class="form-control account-form" name="name"
                                            id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control account-form" name="phone_number"
                                            id="phone_number" placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Address</label>
                                <input type="text" class="form-control account-form" name="address" id="address"
                                    placeholder="Address">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Provinsi</label>
                                        <select class="form-control account-form" name="provinsi" id="provinsi">
                                            <option value=""disabled selected>Pilih Provinsi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Kabupaten / Kota</label>
                                        <select class="form-control account-form" name="kabupaten_kota"
                                            id="kabupaten_kota" disabled>
                                            <option value=""disabled selected>Pilih Kabupaten / Kota</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Kecamatan</label>
                                        <select class="form-control account-form" name="kecamatan" id="kecamatan"
                                            disabled>
                                            <option value=""disabled selected>Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Kelurahan / Desa</label>
                                        <select class="form-control account-form" name="kelurahan_desa"
                                            id="kelurahan_desa" disabled>
                                            <option value=""disabled selected>Pilih Kelurahan / Desa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn w-100 text-white bg-main blue-button mb-3"
                                id="addAddress">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addressEditModal" tabindex="-1" role="dialog" aria-labelledby="addressEditModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content p-5">
                <div class="modal-body">
                    <div class="form-title">
                        <div class="d-flex justify-content-between py-3">
                            <h3>Edit Alamat</h3>
                        </div>
                    </div>
                    <div class="">
                        <form class="address">
                            <input type="hidden" name="id" id="e-id">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Label</label>
                                        <input type="text" class="form-control account-form" name="name"
                                            id="e-name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control account-form" name="phone_number"
                                            id="e-phoneNumber" placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Address</label>
                                <input type="text" class="form-control account-form" name="address" id="e-address"
                                    placeholder="Masukkan alamat anda">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Provinsi</label>
                                        <select class="form-control account-form" name="provinsi" id="e-provinsi">
                                            <option value=""disabled selected>Pilih Provinsi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Kabupaten / Kota</label>
                                        <select class="form-control account-form" name="kabupaten_kota"
                                            id="e-kabupatenKota" disabled>
                                            <option value=""disabled selected>Pilih Kabupaten / Kota</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Kecamatan</label>
                                        <select class="form-control account-form" name="kecamatan" id="e-kecamatan"
                                            disabled>
                                            <option value=""disabled selected>Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">Kelurahan / Desa</label>
                                        <select class="form-control account-form" name="kelurahan_desa"
                                            id="e-kelurahanDesa" disabled>
                                            <option value=""disabled selected>Pilih Kelurahan / Desa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn w-100 text-white bg-main blue-button mb-3"
                                id="editAddress">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.select-form').select2({
            minimumResultsForSearch: -1,
            width: '100%'
        });

        $(document).ready(function() {
            oTableInbox = $('#transactionHistory').DataTable({
                "serverSide": "true",
                "processing": "true",
                "ordering": false,
                "searching": false,
                "autoWidth": true,
                "lengthChange": false,
                "pageLength": 5,
                "paging": true,
                "ajax": {
                    "url": "{{ route('transaction.history') }}",
                    "type": "POST",
                    "datatype": "JSON",
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    "data": function data(d) {
                        d.search = $('#transactionFiltervalue').val()
                    }
                },
                "columns": [{
                    data: "data",
                    name: "data"
                }, ]
            });
            $('#orderingValue').change(function(e) {
                e.preventDefault();
                var dataForm = getFormData($('#filterTransaction'));
                $('#transactionFiltervalue').val(JSON.stringify(dataForm));
                var table = oTableInbox;
                table.search($('#transactionFiltervalue').val());
                table.draw();
            });

            getProvinsiData('#provinsi', {});
            getProvinsiData('#e-provinsi', {});

            $('.profil_account').click(function() {
                $(this).addClass('account-listing-active').removeClass('account-listing');
                $('.password_account').removeClass('account-listing-active').addClass('account-listing');
                $('.history_account').removeClass('account-listing-active').addClass('account-listing');
                $('.profil-section').removeClass('dp-none');
                $('.password-section').addClass('dp-none');
                $('.history-section').addClass('dp-none');
                $('.detail-section').addClass('dp-none');
            });
            $('.password_account').click(function() {
                $(this).addClass('account-listing-active').removeClass('account-listing');
                $('.history_account').removeClass('account-listing-active').addClass('account-listing');
                $('.profil_account').removeClass('account-listing-active').addClass('account-listing');
                $('.profil-section').addClass('dp-none');
                $('.password-section').removeClass('dp-none');
                $('.history-section').addClass('dp-none');
                $('.detail-section').addClass('dp-none');
            });
            $('.history_account').click(function() {
                $(this).addClass('account-listing-active').removeClass('account-listing');
                $('.password_account').removeClass('account-listing-active').addClass('account-listing');
                $('.profil_account').removeClass('account-listing-active').addClass('account-listing');
                $('.profil-section').addClass('dp-none');
                $('.password-section').addClass('dp-none');
                $('.history-section').removeClass('dp-none');
                $('.detail-section').addClass('dp-none');
            });
            $('#detailHref').click(function() {
                $('.password_account').removeClass('account-listing-active').addClass('account-listing');
                $('.profil_account').removeClass('account-listing-active').addClass('account-listing');
                $('.profil-section').addClass('dp-none');
                $('.password-section').addClass('dp-none');
                $('.history-section').removeClass('dp-none');
                $('.detail-section').addClass('dp-none');
                $(this).addClass('d-none');
            });
            $('.change_bio_button').click(function(e) {
                e.preventDefault();
                $(this).addClass('dp-none');
                $('#bioName').prop('disabled', false);
                $('#bioDate').prop('disabled', false);
                $('#bioGender').prop('disabled', false);
                $('#bioNumber').prop('disabled', false);
                $('.save_bio_button').removeClass('dp-none');
            });
            $('.save_bio_button').click(function(e) {
                e.preventDefault();
                saveBio($(this).data('id'));
                $(this).addClass('dp-none');
                $('#bioName').prop('disabled', true);
                $('#bioDate').prop('disabled', true);
                $('#bioGender').prop('disabled', true);
                $('#bioNumber').prop('disabled', true);
                $('.change_bio_button').removeClass('dp-none');
            });
            $('#addAddress').click(function(e) {
                e.preventDefault();
                addAddress();
            });
            $('#provinsi').change(function() {
                getKabupatenKotaData('#kabupaten_kota', {
                    provinsi_id: $(this).val()
                });
                $('#kabupaten_kota').find("option").remove()
                $('#kabupaten_kota').append(
                    '<option value="" disabled selected>Pilih Kabupaten / Kota</option>'
                ).prop("disabled", true);

                $('#kecamatan').find("option").remove()
                $('#kecamatan').append(
                    '<option value="" disabled selected>Pilih Kecamatan</option>'
                ).prop("disabled", true);

                $('#kelurahan_desa').find("option").remove()
                $('#kelurahan_desa').append(
                    '<option value="" disabled selected>Pilih Kelurahan / Desa</option>'
                ).prop("disabled", true);
            });
            $('#kabupaten_kota').change(function() {
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
                getKelurahanDesaData('#kelurahan_desa', {
                    kecamatan_id: $(this).val()
                });
                $('#kelurahan_desa').find("option").remove()
                $('#kelurahan_desa').append(
                    '<option value="" disabled selected>Pilih Kelurahan / Desa</option>'
                ).prop("disabled", true);
            });
            $('#e-provinsi').change(function() {
                getKabupatenKotaData('#e-kabupatenKota', {
                    provinsi_id: $(this).val()
                });
                $('#e-kabupatenKota').find("option").remove()
                $('#e-kabupatenKota').append(
                    '<option value="" disabled selected>Pilih Kabupaten / Kota</option>'
                ).prop("disabled", true);

                $('#e-kecamatan').find("option").remove()
                $('#e-kecamatan').append(
                    '<option value="" disabled selected>Pilih Kecamatan</option>'
                ).prop("disabled", true);

                $('#e-kelurahanDesa').find("option").remove()
                $('#e-kelurahanDesa').append(
                    '<option value="" disabled selected>Pilih Kelurahan / Desa</option>'
                ).prop("disabled", true);
            });
            $('#e-kabupatenKota').change(function() {
                getKecamatanData('#e-kecamatan', {
                    kabupaten_kota_id: $(this).val()
                });
                $('#e-kecamatan').find("option").remove()
                $('#e-kecamatan').append(
                    '<option value="" disabled selected>Pilih Kecamatan</option>'
                ).prop("disabled", true);

                $('#e-kelurahanDesa').find("option").remove()
                $('#e-kelurahanDesa').append(
                    '<option value="" disabled selected>Pilih Kelurahan / Desa</option>'
                ).prop("disabled", true);
            });
            $('#e-kecamatan').change(function() {
                getKelurahanDesaData('#e-kelurahanDesa', {
                    kecamatan_id: $(this).val()
                });
                $('#e-kelurahanDesa').find("option").remove()
                $('#e-kelurahanDesa').append(
                    '<option value="" disabled selected>Pilih Kelurahan / Desa</option>'
                ).prop("disabled", true);
            });
            $('.edit-address').click(function(e) {
                e.preventDefault();
                getAddress($(this).data('addressid'));
            });
            $('button#editAddress').click(function(e) {
                e.preventDefault();
                editAddress($('#e-id').val());
            });
            $('.delete-address').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure want to delete this address?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    confirmButtonColor: '#4395d1',
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteAddress($(this).data('addressid'));
                    }
                })
            });
            $('#profilePict').change(function(e) {
                e.preventDefault();
                var formData = new FormData();
                formData.append('images_thumbnail', $(this)[0].files[0]);
                changeProfilePict(formData);
            });

            // Add an event listener to the form submit event
            $('#update-password-form').submit(function(e) {
                e.preventDefault(); // Prevent the form from submitting

                // Send an AJAX request to the server
                $.ajax({
                    url: '{{ route('change.password') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status === 'success') {
                            // Show success Sweet Alert
                            swalSuccess(response.message);

                            // Reset the form
                            $('#update-password-form')[0].reset();
                        } else {
                            // Show error Sweet Alert
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message
                            });
                        }
                    },
                    error: function(response) {
                        // Show error Sweet Alert
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message
                        });
                    }
                });
            });

            $('#pickedUpBtn').click(function() {
                var thisId = $(this).data('id');
                $.ajax({
                    url: '{{ route('transaction.pickedup') }}',
                    type: 'POST',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: {
                        id: thisId,
                    },
                    success: function(result) {
                        if (result.code == 200) {
                            if (result.redirectTo != "") {
                                if (result.redirectTo == "reload") {
                                    swalSuccessReload(result);
                                } else if (result.redirectTo == "modalAdd") {
                                    swalSuccessHideModal(result);
                                } else {
                                    swalSuccessRedirect(result);
                                }
                            } else {
                                swalSuccess(result);
                            }
                        } else {
                            if (typeof result.redirectTo === "undefined") {
                                swalWarning(result);
                            } else {
                                if (result.redirectTo != "") {
                                    swalWarningRedirect(result);
                                } else {
                                    swalWarning(result);
                                }
                            }
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message
                        });
                    }
                });
            });
        });

        function getDetailHistory(uid) {
            $('#detailHref').removeClass('d-none')
            $.ajax({
                url: '{{ route('transaction.detail') }}',
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: uid,
                },
                dataType: "JSON",
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function success(result) {
                    if (result.code == 200) {
                        if (result.redirectTo != '') {
                            if (result.redirectTo == 'reload') {
                                swalSuccessReload(result);
                            } else if (result.redirectTo == 'modalAdd') {
                                swalSuccessHideModal(result);
                            } else {
                                swalSuccessRedirect(result);
                            }
                        } else {
                            $('.profil-section').addClass('dp-none');
                            $('.password-section').addClass('dp-none');
                            $('.history-section').addClass('dp-none');
                            loadHistoryData(result.data.transaction, result.data.render, result.data.totalProductPrice);
                            $('.detail-section').removeClass('dp-none');
                            Swal.close();
                        }
                    } else {
                        swalWarning(result);
                    }
                },
                error: function error(result) {
                    console.log(result);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi Kesalahan!'
                    });
                }
            });
        }

        function loadHistoryData(data, render,totalProductPrice) {
            $('#transaction-id').text(data.transaction_code);
            var dateOptions = {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            var dateTimeOptions = {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                hour12: false
            };
            $('#transaction-created-at').text('Order dibuat: ' + new Date(data.created_at).toLocaleDateString('id-ID',
                dateOptions));
            if(data.store_pickup_id){
                $('#pickUpStore').removeClass('d-none');
                $('#shippingProgress').addClass('d-none');
                $('#storeName').html(data.store.title);
                $('#storeAddress').html(data.store.address);
                $('#storePhoneNumber').html(data.store.phone);
            }else{
                $('#pickUpStore').addClass('d-none');
                $('#shippingProgress').removeClass('d-none');
            }

            if (data.status == '6') {
                $('#transactionStatus').parent().removeClass('pending-status').removeClass('canceled-status').addClass(
                    'finished-status');
            } else {
                if (data.status == '7') {
                    $('#transactionStatus').parent().removeClass('pending-status').removeClass('finished-status').addClass(
                        'canceled-status');
                } else {
                    $('#transactionStatus').parent().removeClass('canceled-status').removeClass('finished-status').addClass(
                        'pending-status');
                }
            }
            if (data.status_transaction) {
                $('#transactionStatus').text(data.status_transaction.title);
            }

            if (data.verification_at != null) {
                $('#verifiedTitle').text('Pembayaran Telah di Verifikasi');
                $('#verifiedTitle').prev().removeClass('mini-progress-bar-inactive').addClass('mini-progress-bar-active');
                $('#verifiedTime').text(new Date(data.verification_at).toLocaleDateString('id-ID', dateTimeOptions));
                $('#verifiedTime').removeClass('text-white').addClass('text-hue');
            } else {
                $('#verifiedTitle').text('Pembayaran Menunggu Verifikasi');
                $('#verifiedTime').text('-');
                $('#verifiedTitle').prev().removeClass('mini-progress-bar-active').addClass('mini-progress-bar-inactive');
                $('#verifiedTime').removeClass('text-hue').addClass('text-white');
            }

            if (data.packing_at != null) {
                $('#proccessTitle').text('Pesanan Telah Di proses');
                $('#proccessTime').text(new Date(data.packing_at).toLocaleDateString('id-ID', dateTimeOptions));
                $('#proccessTitle').prev().removeClass('mini-progress-bar-inactive').addClass('mini-progress-bar-active');
                $('#proccessTime').removeClass('text-white').addClass('text-hue');
            } else {
                $('#proccessTitle').text('Pesanan Sedang Di proses');
                $('#proccessTime').text('-');
                $('#proccessTitle').prev().removeClass('mini-progress-bar-active').addClass('mini-progress-bar-inactive');
                $('#proccessTime').removeClass('text-hue').addClass('text-white');
            }

            if (data.waiting_pickup_at != null) {
                $('#pickupTitle').text('Sudah di Pickup');
                $('#pickupTime').text(new Date(data.waiting_pickup_at).toLocaleDateString('id-ID', dateTimeOptions));
                $('#pickupTitle').prev().removeClass('mini-progress-bar-inactive').addClass('mini-progress-bar-active');
                $('#pickupTime').removeClass('text-white').addClass('text-hue');

            } else {
                $('#pickupTitle').text('Menunggu Pickup');
                $('#pickupTime').text('-');
                $('#pickupTitle').prev().removeClass('mini-progress-bar-active').addClass('mini-progress-bar-inactive');
                $('#pickupTime').removeClass('text-hue').addClass('text-white');
            }

            if (data.pickup_at != null) {
                $('#sentTitle').text('Pesanan Sedang Dikirim');
                $('#sentTime').text(new Date(data.pickup_at).toLocaleDateString('id-ID', dateTimeOptions));
                $('#sentTitle').prev().removeClass('mini-progress-bar-inactive').addClass('mini-progress-bar-active');
                $('#sentTime').removeClass('text-white').addClass('text-hue');
            } else {
                $('#sentTitle').text('Pesanan Belum Dikirim');
                $('#sentTime').text('-');
                $('#sentTitle').prev().removeClass('mini-progress-bar-active').addClass('mini-progress-bar-inactive');
                $('#sentTime').removeClass('text-hue').addClass('text-white');
            }

            if (data.finish_at != null) {
                $('#arrivedTitle').text('Pesanan Sudah Sampai');
                $('#arrivedTime').text(new Date(data.finish_at).toLocaleDateString('id-ID', dateTimeOptions));
                $('#arrivedTitle').prev().removeClass('mini-progress-bar-inactive').addClass('mini-progress-bar-active');
                $('#arrivedTime').removeClass('text-white').addClass('text-hue');
            } else {
                $('#arrivedTitle').text('Pesanan Belum Sampai');
                $('#arrivedTime').text('-');
                $('#arrivedTitle').prev().removeClass('mini-progress-bar-active').addClass('mini-progress-bar-inactive');
                $('#arrivedTime').removeClass('text-hue').addClass('text-white');
            }
            if (data.address) {
                $('#transactionPhoneNumber').text(data.address.phone_number);
                $('#transactionAddress').text(data.address.address + ', ' + data.address.kode_pos);
                $('#addressName').text(data.address.name);
            }

            $("#productList").html(render);
            $('#paymentMethod').text(data.payment_method_id);
            $('#totalTransaction').text('Rp. ' + totalProductPrice);
            if(data.discount){
                var discount = data.discount;
            } else {
                var discount = 0;
            }
            $('#discountTransaction').text('Rp. ' + discount);
            if(data.shipping_price){
                var shipping_price = data.shipping_price;
            } else {
                var shipping_price = 0;
            }
            $('#shippingCost').text('Rp. '+shipping_price);
            $('#overallTransaction').text('Rp. ' + data.total);
            $('#pickedUpBtn').attr('data-id', data.id);

            if (data.shipping_method_id == 'pckptstr' && data.verification_at !== null) {
                $('#pickedUpBtn').removeClass('d-none');
            } else {
                if (data.shipping_method_id == 'pckptstr' && data.status == 2) {
                    $('#pickedUpBtn').removeClass('d-none');
                } else {
                    $('#pickedUpBtn').addClass('d-none');
                }
            }
        }

        function saveBio(bioId) {
            $.ajax({
                url: '/account/bio/edit/' + bioId,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: $('#bioName').val(),
                    birth_date: $('#bioDate').val(),
                    gender: $('#bioGender').val(),
                    email: $('#bioEmail').val(),
                    phone_number: $('#bioNumber').val(),
                },
                dataType: "JSON",
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function success(result) {
                    console.log(result);
                    if (result.code == 200) {
                        if (result.redirectTo != '') {
                            if (result.redirectTo == 'reload') {
                                swalSuccessReload(result);
                            } else if (result.redirectTo == 'modalAdd') {
                                swalSuccessHideModal(result);
                            } else {
                                swalSuccessRedirect(result);
                            }
                            // swalSuccess(result);
                        } else {
                            swalSuccess(result);
                        }
                    } else {
                        swalWarning(result);
                    }
                },
                error: function error(result) {
                    console.log(result);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi Kesalahan!'
                    });
                }
            });
        }

        function addAddress() {
            $('span.error').remove();
            $('.account-form').removeClass('is-invalid').removeClass('invalid-error');
            $.ajax({
                url: '{{ route('address.add') }}',
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: $('#name').val(),
                    address: $('#address').val(),
                    phone_number: $('#phone_number').val(),
                    provinsi: $('#provinsi').val(),
                    kabupaten_kota: $('#kabupaten_kota').val(),
                    kecamatan: $('#kecamatan').val(),
                    kelurahan_desa: $('#kelurahan_desa').val(),
                    kode_pos: $('#kelurahan_desa').find("option:selected").data('postal'),
                },
                dataType: "JSON",
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function success(result) {
                    console.log(result);
                    if (result.code == 200) {
                        if (result.redirectTo != '') {
                            if (result.redirectTo == 'reload') {
                                swalSuccessReload(result);
                            } else if (result.redirectTo == 'modalAdd') {
                                swalSuccessHideModal(result);
                            } else {
                                swalSuccessRedirect(result);
                            }
                        } else {
                            swalSuccess(result);
                            $('#addressModal').modal("hide");
                            $('.address-list').append(
                                '<div class="row">' +
                                '<div class="col-md-3 p-3">' +
                                '<h5 class="">Alamat ' + result.data.name + '</h5>' +
                                '<p class="txt-color-main edit-address" data-addressId="' + result.data.id +
                                '"' +
                                'data-bs-toggle="modal" data-bs-target="#addressEditModal">Ubah</p>' +
                                '</div>' +
                                '<div class="col-md-9">' +
                                '<div class="d-flex align-items-center justify-content-end">' +
                                '<input type="text" class="form-control account-form text-wrap"' +
                                'id="' + result.data.id + '"' +
                                'value="' + result.data.name + ' - ' +
                                result.data.phone_number + ' - ' +
                                result.data.address + ', ' +
                                result.data.kode_pos + ', ' +
                                capitalizeFirstLetter(result.data.kelurahan_desa.kelurahan_desa_name
                                    .toLowerCase()) + ', ' +
                                capitalizeFirstLetter(result.data.kecamatan.kecamatan_name.toLowerCase()) +
                                ', ' +
                                capitalizeFirstLetter(result.data.kabupaten_kota.kabupaten_kota_name
                                    .toLowerCase()) + ', ' +
                                capitalizeFirstLetter(result.data.provinsi.provinsi_name.toLowerCase()) +
                                '" ' +
                                'disabled>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                    } else {
                        swalWarning(result);
                    }
                },
                error: function error(result) {
                    console.log(result);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi Kesalahan!'
                    });
                }
            });
        }

        function getAddress(uid) {
            $.ajax({
                url: '{{ route('address.get', ['id' => ':id']) }}'.replace(':id', uid),
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function success(result) {
                    console.log(result);
                    if (result.code == 200) {
                        if (result.redirectTo != '') {
                            if (result.redirectTo == 'reload') {
                                swalSuccessReload(result);
                            } else if (result.redirectTo == 'modalAdd') {
                                swalSuccessHideModal(result);
                            } else {
                                swalSuccessRedirect(result);
                            }
                        } else {
                            $('#e-id').val(result.data.id);
                            $('#e-name').val(result.data.name);
                            $('#e-address').val(result.data.address);
                            $('#e-phoneNumber').val(result.data.phone_number);
                            $('#e-provinsi').val(result.data.provinsi.provinsi_id).trigger('change');
                            setTimeout(() => {
                                $('#e-kabupatenKota').val(result.data.kabupaten_kota_id).trigger(
                                    'change');
                            }, 2000);
                            setTimeout(() => {
                                $('#e-kecamatan').val(result.data.kecamatan_id).trigger('change');
                            }, 4000);
                            setTimeout(() => {
                                $('#e-kelurahanDesa').val(result.data.kelurahan_desa_id).trigger(
                                    'change');
                            }, 6000);
                            setTimeout(() => {
                                Swal.close();
                            }, 6000);
                        }
                    } else {
                        swalWarning(result);
                    }
                },
                error: function error(result) {
                    console.log(result);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi Kesalahan!'
                    });
                }
            });
        }

        function editAddress(uid) {
            $.ajax({
                url: '{{ route('address.edit', ['id' => ':id']) }}'.replace(':id', uid),
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: $('#e-name').val(),
                    address: $('#e-address').val(),
                    phone_number: $('#e-phoneNumber').val(),
                    provinsi: $('#e-provinsi').val(),
                    kabupaten_kota: $('#e-kabupatenKota').val(),
                    kecamatan: $('#e-kecamatan').val(),
                    kelurahan_desa: $('#e-kelurahanDesa').val(),
                    kode_pos: $('#e-kelurahanDesa').find("option:selected").data('postal'),
                },
                dataType: "JSON",
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function success(result) {
                    console.log(result);
                    if (result.code == 200) {
                        if (result.redirectTo != '') {
                            if (result.redirectTo == 'reload') {
                                swalSuccessReload(result);
                            } else if (result.redirectTo == 'modalAdd') {
                                swalSuccessHideModal(result);
                            } else {
                                swalSuccessRedirect(result);
                            }
                        } else {
                            swalSuccess(result);
                            $('#addressEditModal').modal("hide");
                            console.log($('h5#title-' + result.data.id + ''));
                            $('h5#title-' + result.data.id + '').html('Alamat ' + result.data.name);
                            $('input#' + result.data.id + '').val('' + result.data.name +
                                ' - ' +
                                result.data.phone_number + ' - ' +
                                result.data.address + ', ' +
                                result.data.kode_pos + ', ' +
                                capitalizeFirstLetter(result.data.kelurahan_desa.kelurahan_desa_name
                                    .toLowerCase()) + ', ' +
                                capitalizeFirstLetter(result.data.kecamatan.kecamatan_name.toLowerCase()) +
                                ', ' +
                                capitalizeFirstLetter(result.data.kabupaten_kota.kabupaten_kota_name
                                    .toLowerCase()) + ', ' +
                                capitalizeFirstLetter(result.data.provinsi.provinsi_name.toLowerCase()) +
                                '');
                        }
                    } else {
                        swalWarning(result);
                    }
                },
                error: function error(result) {
                    console.log(result);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi Kesalahan!'
                    });
                }
            });
        }

        function deleteAddress(uid) {
            $.ajax({
                url: '{{ route('address.delete', ['id' => ':id']) }}'.replace(':id', uid),
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function success(result) {
                    console.log(result);
                    if (result.code == 200) {
                        if (result.redirectTo != '') {
                            if (result.redirectTo == 'reload') {
                                swalSuccessReload(result);
                            } else if (result.redirectTo == 'modalAdd') {
                                swalSuccessHideModal(result);
                            } else {
                                swalSuccessRedirect(result);
                            }
                        } else {
                            $('#row-' + uid).remove();
                            swalSuccess(result);
                        }
                    } else {
                        swalWarning(result);
                    }
                },
                error: function error(result) {
                    console.log(result);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi Kesalahan!'
                    });
                }
            });
        }

        function changeProfilePict(data) {
            $.ajax({
                url: '{{ route('account.profilepict') }}',
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function(result) {
                    console.log(result);
                    if (result.code == 200) {
                        if (result.redirectTo != '') {
                            if (result.redirectTo == 'reload') {
                                swalSuccessReload(result);
                            } else if (result.redirectTo == 'modalAdd') {
                                swalSuccessHideModal(result);
                            } else {
                                swalSuccessRedirect(result);
                            }
                        } else {
                            $('#profilePictImage').attr('src', result.data);
                            swalSuccess(result);
                        }
                    } else {
                        swalWarning(result);
                    }
                },
                error: function(result) {
                    console.log(result);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi Kesalahan!'
                    });
                }
            });
        }
    </script>
@endsection
