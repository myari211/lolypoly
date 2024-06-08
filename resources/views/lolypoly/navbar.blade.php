<div class="navbar navbar-expand-md navbar-light bg-light shadow">
    <div class="container">
        <div class="logo me-3">
            <a href="{{ route('lolypoly.home') }}">
                <img src="{{ asset('images/logo/logo.png') }}" alt="logo">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <h5>Shopping</h5>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categoriesNavBar as $catnav)
                            <a class="dropdown-item"
                                href="{{ route('lolypoly.shopping', ['id' => $catnav->id]) }}">{{ $catnav->title }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item me-3">
                    <h5><a class="nav-link text-dark" href="{{ route('lolypoly.about.us') }}">About Us</a></h5>
                </li>
                <li class="nav-item me-3">
                    <h5><a class="nav-link  text-dark" href="{{ route('lolypoly.find.us') }}">Find Us</a></h5>
                </li>
                <li class="nav-item me-3">
                    <h5><a class="nav-link  text-dark" href="{{ route('lolypoly.dyoc.index') }}">Design Your Case</a></h5>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item navbar-icon">
                    <a class="nav-link icon" href="#" id="searchToggle" aria-label="Toggle search bar"><img
                            class="nav-link" src="{{ asset('images/icons/search.png') }}"></a>
                    <a class="nav-link text" href="#" id="searchToggle" aria-label="Toggle search bar">
                        <h5><span class="nav-link text-dark">Search</span></h5>
                    </a>
                </li>
                @if (Session::has('user'))
                    <li class="nav-item navbar-icon">
                        <a class="nav-link icon position-relative" href="#" id="cartToggle"
                            aria-label="Toggle cart section">
                            <img class="nav-link" src="{{ asset('images/icons/cart.png') }}">
                            <span
                                class="position-absolute top-right translate-middle badge rounded-circle bg-danger"id="cartCounter">
                                {{ count((new \App\Helpers\GeneralFunction())->getCart()->data) }} </span>
                        </a>
                        <a class="nav-link text" href="#" id="cartToggle" aria-label="Toggle cart section">
                            <h5><span class="nav-link text-dark">Cart</span>
                            </h5>
                        </a>
                    </li>
                    <li class="nav-item navbar-icon dropdown">
                        <a href="{{ route('lolypoly.account') }}" class="nav-link text">
                            <h5><span class="nav-link text-dark">Account</span></h5>
                        </a>
                        <a href="#" class="nav-link dropdown-toggle icon"
                            id="accountDropdown"data-bs-toggle="dropdown" aria-expanded="false"><img class="nav-link"
                                src="{{ asset('images/icons/account.png') }}"></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                            @if (Session::get('user')->type_user == 'CUST')
                                <a class="dropdown-item" href="{{ route('lolypoly.account') }}">Account</a>
                            @else
                                <a class="dropdown-item" href="{{ route('dashboard.index') }}">Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                    <li class="nav-item navbar-icon dropdown">
                        <a href="{{ route('logout') }}" class="nav-link text">
                            <h5><span class="nav-link text-dark">Logout</span></h5>
                        </a>
                    </li>
                @else
                    <li class="nav-item navbar-icon d-flex align-items-center">
                        <a href="#" class="nav-link icon">
                            <button class="border-custom txt-color-main px-3 py-1 bg-white" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Login</button>
                        </a>
                        <a href="{{ route('lolypoly.account') }}" class="nav-link text">
                            <h5><span class="nav-link text-dark" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">Login</span></h5>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
