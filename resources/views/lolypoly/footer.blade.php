<!-- Start Footer Area -->
<footer class="container mt-5 border-top py-5">
    <div class="row">
        <div class="col-md-2">
            <div class="logo me-3">
                <a href="{{ route('lolypoly.home') }}">
                    <img src="{{ asset('images/logo/logo.png') }}" alt="logo" class="w-100">
                </a>
            </div>
        </div>
        <div class="col-md-2">
            <ul>
                <li class="mb-3"><a href="{{ route('lolypoly.home') }}"
                        class="text-decoration-underline fn-gill-sans">HOME</a>
                </li>
                <li class="mb-3"> <a href="{{ route('lolypoly.about.us') }}"
                        class="text-decoration-underline fn-gill-sans">ABOUT US</a></li>
                <li class="mb-3"> <a
                        href="{{ route('lolypoly.shopping', ['id' => 'all', 'page' => '1', 'name' => '']) }}"
                        class="text-decoration-underline fn-gill-sans">SHOP</a></li>
                <li class="mb-3"><a href="{{ route('lolypoly.find.us') }}"
                        class="text-decoration-underline fn-gill-sans">FIND
                        US</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <h5 class="mr-2">Our Store</h5>
                        <button class="border-custom txt-color-main px-3 py-1 bg-white m-0 btn-sm" onClick="window.open('{{ route('lolypoly.find.us') }}')">Visit Store</button>
                    </div>
                </div>
                <div>
                    @foreach ($storeLocation as $store)
                        <div class="row">
                            <div class="col-12">
                                <a href="https://www.google.com/maps/?q={{ 'lolypoly ' . $store->provinsi->provinsi_name }}"
                                    class=" fn-gill-sans-light"
                                    target="_blank">{{ $store->provinsi ? $store->provinsi->provinsi_name : '' }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="">
                <h4 class="mb-3 fn-gill-sans">HELP</h4>
                <div class="footer__inner">
                    <ul class="list-unstyled">
                        @if (Session::has('user'))
                            @if (Session::get('user')->type_user == 'CUST')
                                <li><a href="{{ route('lolypoly.account') }}" class=" fn-gill-sans-light">Track Your
                                        Order</a></li>
                                <li><a href="{{ route('lolypoly.account') }}" class=" fn-gill-sans-light">Payment
                                        Information</a></li>
                            @else
                                <li><a href="{{ route('dashboard.index') }}" class=" fn-gill-sans-light">Track Your
                                        Order</a></li>
                                <li><a href="{{ route('dashboard.index') }}" class=" fn-gill-sans-light">Payment
                                        Information</a></li>
                            @endif
                        @else
                            <li><a href="#" onclick="triggerLoginModal()" class=" fn-gill-sans-light">Track Your
                                    Order</a></li>
                            <li><a href="#" onclick="triggerLoginModal()" class=" fn-gill-sans-light">Payment
                                    Information</a></li>
                        @endif
                        <li><a href="#" class=" fn-gill-sans-light">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="">
                <div class="d-flex gap-3">
                    <div
                        class=" {{ (new \App\Helpers\GeneralFunction())->generalParameterValue('address') == '' ? 'd-none' : '' }}">
                        <div class="bg-main rounded-circle text-center" style="height: 1.5rem;width:1.5rem;">
                            <i class="bi bi-building text-white"></i>
                        </div>
                    </div>
                    <p class=" fn-gill-sans">
                        {{ (new \App\Helpers\GeneralFunction())->generalParameterValue('company_name') }}
                    </p>
                </div>
                <div class="d-flex gap-3">
                    <div
                        class=" {{ (new \App\Helpers\GeneralFunction())->generalParameterValue('address') == '' ? 'd-none' : '' }}">
                        <div class="bg-main rounded-circle text-center" style="height: 1.5rem;width:1.5rem;">
                            <i class="bi bi-geo-alt text-white"></i>
                        </div>
                    </div>
                    <p class=" fn-gill-sans">
                        {{ (new \App\Helpers\GeneralFunction())->generalParameterValue('address') }}
                    </p>
                </div>
                <?php 
                    $phone_number = (new \App\Helpers\GeneralFunction())->generalParameterValue('phone');
                    $cleaned_phone_number = str_replace('-', '', $phone_number);
                    $whatsapp_url = 'https://wa.me/62' . $cleaned_phone_number;
                ?>
                <div class="d-flex gap-3">
                    <div>
                        <div class="bg-main rounded-circle text-center" style="height: 1.5rem;width:1.5rem;">
                            <i class="bi bi-telephone text-white"></i>
                        </div>
                    </div>
                    <p> <a href="{{ $whatsapp_url }}" target="_blank"
                            class=" fn-gill-sans">
                            +62 {{ (new \App\Helpers\GeneralFunction())->generalParameterValue('phone') }}
                        </a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end gap-3">
        @foreach($public_button as $data)
            <div>
                <button type="button" class="btn btn-md bg-main rounded-circle text-center d-lfex justify-content-center align-items-center" onclick="window.open('{{ $data->url }}')">
                    <i class="{{ $data->icon }} h6 text-white"></i>
                </button>
            </div>
        @endforeach
    </div>
</footer>
