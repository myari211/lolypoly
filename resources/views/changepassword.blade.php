<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('lolypoly.head')
</head>

<body class="bg-main">
    <div class="container" style="height: 100vh;">
        <div class="d-flex align-items-center justify-content-center h-100">
            <div class="password-section p-3 w-100">
                <div class="container my-3">
                    <h2>Ubah Kata Sandi</h2>
                </div>
                <form id="change-password-form" action="{{ route('forgot.change.password') }}" method="POST">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
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
        </div>
    </div>
    @include('lolypoly.foot')
    <script>
    </script>
</body>

</html>
