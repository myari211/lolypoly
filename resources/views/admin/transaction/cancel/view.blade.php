@extends('layouts.admin.app', ['title' => 'process','parent' => 'Transaction'])

@section('title', 'Detail Transaction')
@section('header')
    <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
    <link rel="stylesheet" href="{{ asset('css/transactionstyle.css') }}">
@endsection
@php
    $totalPrice = $data_transaction_detail->where('transaction_id', $data_transaction->id)->sum('price');
    $formattedPrice = number_format($totalPrice, 0, '.', ',');
@endphp
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header title-header-block package-card">
                            <div>
                                <h5>{{ $data_transaction->transaction_code}}</h5>
                            </div>
                            <div class="card-order-section">
                                <ul>
                                    <li>{{ $data_transaction->created_at->format('F d, Y \a\t h:i A')}}</li>
                                    <li>{{ $data_transaction_detail->where('transaction_id', $data_transaction->id)->count() }} items</li>
                                    <li>Total Rp{{ $data_transaction->sub_total }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bg-inner order-details-table">
                            <div class="row g-4">
                                <div class="col-xl-9">
                                    <div class="table-responsive table-details">
                                        <table class="table cart-table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">Items</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data_transaction->detail as $detail)
                                                <tr class="table-order">
                                                    <td>
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ $detail->product_image }}" class="blur-up lazyload" style="height: 80px; width: 100px; border-radius: 5px;" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <p>Product Name</p>
                                                        <h5>{{ $detail->product_name }}</h5>
                                                    </td>
                                                    <td>
                                                        <p>Quantity</p>
                                                        <h5>{{ $detail->stock }}</h5>
                                                    </td>
                                                    <td>
                                                        <p>Price</p>
                                                        <h5>{{ $detail->product_price }}</h5>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Shipping</h5>
                                                    </td>
                                                    <td>
                                                        <h4>Rp {{ (new \App\Helpers\GeneralFunction())->convertToCurrency($data_transaction->shipping_price) }}</h4>
                                                    </td>
                                                </tr>
                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Subtotal</h5>
                                                    </td>
                                                    <td>
                                                        <h4>Rp {{ (new \App\Helpers\GeneralFunction())->convertToCurrency($data_transaction->sub_total) }}</h4>
                                                    </td>
                                                </tr>
                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Discount (-)</h5>
                                                    </td>
                                                    <td>
                                                        <h4>Rp {{ (new \App\Helpers\GeneralFunction())->convertToCurrency($data_transaction->discount) }}</h4>
                                                    </td>
                                                </tr>

                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h4 class="theme-color fw-bold">Total Price</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="theme-color fw-bold">Rp {{ (new \App\Helpers\GeneralFunction())->convertToCurrency($data_transaction->total) }}</h4>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="order-success">
                                        <div class="row g-4">
                                            @if($data_transaction->statusTransaction)
                                                @if($data_transaction->statusTransaction->id == 7)
                                                    <div class="canceled-status text-center py-2 px-3 rounded-pill">
                                                        <span>
                                                            {{ $data_transaction->statusTransaction->title }}
                                                        </span>
                                                    </div>
                                                @elseif($data_transaction->statusTransaction->id == 6)
                                                    <div class="finished-status text-center py-2 px-3 rounded-pill">
                                                        <span>
                                                            {{ $data_transaction->statusTransaction->title }}
                                                        </span>
                                                    </div>
                                                @else
                                                    <div class="pending-status text-center py-2 px-3 rounded-pill">
                                                        <span>
                                                            {{ $data_transaction->statusTransaction->title }}
                                                        </span>
                                                    </div>
                                                @endif
                                            @endif

                                            <h4>summary</h4>
                                            <ul class="order-details list-unstyled">
                                                <li>Order ID: {{ $data_transaction->transaction_code}}</li>
                                                <li>Order Date: {{ $data_transaction->created_at->format('M d, Y \a\t h:i A')}}</li>
                                            </ul>

                                            @if($data_transaction->address)
                                                <h4>shipping address</h4>
                                                <ul class="order-details list-unstyled">
                                                    <li>
                                                            {{ $data_transaction->address->name }} -
                                                            {{ $data_transaction->address->address }},
                                                            {{ ucwords(strtolower($data_transaction->address->kelurahanDesa->kelurahan_desa_name)) }},
                                                            {{ ucwords(strtolower($data_transaction->address->kecamatan->kecamatan_name)) }},
                                                            {{ ucwords(strtolower($data_transaction->address->kabupatenKota->kabupaten_kota_name)) }},
                                                            {{ ucwords(strtolower($data_transaction->address->provinsi->provinsi_name)) }}, {{ $data_transaction->address->kode_pos }}
                                                    </li>
                                                </ul>
                                            @endif

                                            <div class="payment-mode">
                                                <h4>payment method</h4>
                                                <p>{{ $data_transaction->payment_method_id.' '.(($data_transaction->payment_method_name) ? ' ('.$data_transaction->payment_method_name.')' : '') }}</p>
                                            </div>

                                            <!-- <div class="delivery-sec">
                                                <h3>expected date of delivery: <span>October 22, 2018</span></h3>
                                                <a href="order-tracking.html">track order</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>

@endsection

@push('body-scripts')
<link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
<link rel="stylesheet" href="{{ asset('css/transactionstyle.css') }}">
@endpush