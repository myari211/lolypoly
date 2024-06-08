@extends('lolypoly.app')

@section('content')
    <div class="container py-5">
        <div class="mini-section">
            <img src="{{ asset('images/product/product-highlight.png') }}" alt="img-fluid w-100">
        </div>
    </div>
    <div class="container py-5">
        <div class="mini-section">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="mb-3">
                        <h2 class="mb-3"><b>Kategori Produk</b></h2>
                        <input type="hidden" id="hidddenCatId" value="{{ $catId }}">
                        <input type="hidden" id="pageNumber" value="{{ $page }}">
                        <input type="hidden" id="qname" value="{{ $qname }}">
                        <ul class="nav nav-pills flex-column nav-sidebar">
                            @foreach ($categoryList as $cat)
                                @if ($cat->has_child)
                                    <li class="nav-item d-flex justify-content-between align-items-center my-1">
                                        <h5 class="cat-item" data-id="{{ $cat->id }}" role="button">
                                            {{ $cat->title }}</h5>
                                        <i class="fa-solid fa-angle-down" data-bs-toggle="collapse"
                                            data-bs-target="#{{ $cat->id }}" aria-expanded="false"
                                            aria-controls="{{ $cat->id }}"></i>
                                    </li>
                                    <ul class="collapse px-3" id="{{ $cat->id }}">
                                        @foreach ($cat->child as $child)
                                            <li class="nav-item d-flex justify-content-between align-items-center my-1">
                                                <h5 class="cat-item" data-id="{{ $child->id }}" role="button">
                                                    {{ $child->title }}</h5>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <li class="nav-item d-flex justify-content-between align-items-center my-1">
                                        <h5 class="cat-item" data-id="{{ $cat->id }}" role="button">
                                            {{ $cat->title }}</h5>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="my-3">
                        <div class="row mb-3">
                            <div class="col">
                                <h2><b>Harga</b></h2>
                            </div>
                            <div class="col text-end">
                                <span class="reset-price"><a href="#">Reset</a></span>
                            </div>
                        </div>
                        <div class="input-group my-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control numeric-mask" id="priceMin" placeholder="Tulis Harga Minimum" onchange="fetchProducts()">
                        </div>
                        <div class="input-group my-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control numeric-mask" id="priceMax" placeholder="Tulis Harga Maksimum" onchange="fetchProducts()">
                        </div>
                        <div class="form-group">
                            <div class="form-check d-flex align-items-center gap-3">
                                <input type="radio" name="range_price" id="" class="form-check-input"
                                    value="1">
                                <label for="" class="form-check-label">Rp 50.000 - Rp 200.000</label>
                            </div>
                            <div class="form-check d-flex align-items-center gap-3">
                                <input type="radio" name="range_price" id="" class="form-check-input"
                                    value="2">
                                <label for="" class="form-check-label">Rp 200.000 - Rp 500.000</label>
                            </div>
                            <div class="form-check d-flex align-items-center gap-3">
                                <input type="radio" name="range_price" id="" class="form-check-input"
                                    value="3">
                                <label for="" class="form-check-label">Rp 500.000 - Rp 1.000.000</label>
                            </div>
                            <div class="form-check d-flex align-items-center gap-3">
                                <input type="radio" name="range_price" id="" class="form-check-input"
                                    value="4">
                                <label for="" class="form-check-label">Rp 1.000.000 - Rp 2.000.000</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="d-flex justify-content-between">
                        <h4>Menampilkan <b id="totalProduct">0 Produk</b></h4>
                        <div class="d-flex justify-content-end">
                            <h4 class="pe-3"><b>Urutkan</b></h4>
                            <select name="order_by" id="orderBy" class="form-control">
                                <option value="updated_at:desc">Terbaru</option>
                                <option value="updated_at:asc">Terlama</option>
                                <option value="price:desc">Termahal</option>
                                <option value="price:asc">Termurah</option>
                            </select>
                        </div>
                    </div>
                    <div id="prodList" class="my-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            fetchProducts();
            $('.reset-price').click(function(e) {
                e.preventDefault();
                $('#priceMin').val('');
                $('#priceMax').val('');
                $('input[type=radio][name=range_price]').prop("checked", false);
                fetchProducts();
            });
            $('input[type=radio][name=range_price]').change(function() {
                if (this.value == '1') {
                    $('#priceMin').val('50000');
                    $('#priceMax').val('200000');
                } else if (this.value == '2') {
                    $('#priceMin').val('200000');
                    $('#priceMax').val('500000');
                } else if (this.value == '3') {
                    $('#priceMin').val('500000');
                    $('#priceMax').val('1000000');
                } else if (this.value == '4') {
                    $('#priceMin').val('1000000');
                    $('#priceMax').val('2000000');
                }
                fetchProducts();
            });
            $('.cat-item').click(function() {
                $('#hidddenCatId').val($(this).data('id'));
                fetchProducts();
            });
            $('#orderBy').change(function() {
                fetchProducts();
            });
        });

        function previousPage() {
            $('#pageNumber').val($('#pageNumber').val() * 1 - 1);
            fetchProducts();
        }

        function moveToPage(page) {
            $('#pageNumber').val(page);
            fetchProducts();
        }

        function nextPage() {
            $('#pageNumber').val($('#pageNumber').val() * 1 + 1);
            fetchProducts();
        }

        function fetchProducts() {
            $.ajax({
                url: '{{ route('lolypoly.product.shopping') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    price_min: $('#priceMin').val(),
                    price_max: $('#priceMax').val(),
                    order_by: $('#orderBy').val(),
                    id: $('#hidddenCatId').val(),
                    page: $('#pageNumber').val(),
                    name: $('#qname').val()
                },
                beforeSend: function beforeSend() {
                    $('#prodList').html(bootstrapCenterLoading());
                },
                success: function(response) {
                    $('#prodList').html(response.render);
                    $('#totalProduct').text(response.total + ' Produk');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection
