<header class="sticky-top">
    <div class="cart-overlay dp-none"></div>
    <div class="search-bar" id="searchBar">
        <div class="container bg-light p-3 search-bar-container">
            <form id="searchBar">
                <div class="input-group">
                    <input type="text" class="form-control" name="name_search" placeholder="Search here..." aria-label="Search">
                    <button class="btn btn-primary bg-main" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    {{-- <div class="w-100 bg-hue">
        <div class="container d-flex justify-content-end">
            <a href="{{ route('lolypoly.find.us') }}" class="mx-3">Our Location</a>
        </div>
    </div> --}}
    @include('lolypoly.navbar')
    <div class="cart-section  overflow-auto" id="cartSection">
        @include('lolypoly.cart')
    </div>
</header>
