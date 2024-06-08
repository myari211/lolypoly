@extends('layouts.admin.app', ['title' => 'Dashboard', 'parent' => ''])

@section('title', 'Dashboard')

@section('content')
    <section class="p-3">
        <div class="row">
            <div class="col-md-4">
                <div style="border: 1px solid #AB2CB5; background:rgba(171, 44, 181, 0.2);" class="rounded p-3">
                    <div class="d-flex align-items-center" style="gap:1rem;">
                        <img src="{{ asset('images/icons/solar_wallet-2-bold.svg') }}" alt="">
                        <h4 style="color: #AB2CB5" class="m-0">Total Pendapatan</h4>
                    </div>
                    <h2 class="text-center fw-bold my-5" id="totalPendapatan">
                        {{ 'Rp. ' . number_format($total_pendapatan) }}
                    </h2>
                </div>
            </div>
            <div class="col-md-4">
                <div style="border: 1px solid #B5662C; background:rgba(181, 102, 44, 0.1);" class="rounded p-3">
                    <div class="d-flex align-items-center" style="gap:1rem;">
                        <img src="{{ asset('images/icons/healthicons_rdt-result-out-stock.svg') }}" alt="">
                        <h4 style="color: #B5662C" class="m-0">Total Stock Barang</h4>
                    </div>
                    <h2 class="text-center fw-bold my-5" id="totalStock">{{ $total_stock }}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div style="border: 1px solid #36B52C; background:rgba(54, 181, 44, 0.1);" class="rounded p-3">
                    <div class="d-flex align-items-center" style="gap:1rem;">
                        <img src="{{ asset('images/icons/mdi_users-group.svg') }}" alt="">
                        <h4 style="color: #36B52C" class="m-0">Total Customer</h4>
                    </div>
                    <h2 class="text-center fw-bold my-5" id="totalCustomer">{{ $total_customer }}</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="p-3">
        <div class="row">
            <div class="col-md-6">
                <div class="rounded p-3"
                    style="background: rgba(67, 149, 209, 0.1); border:1px solid rgba(67, 149, 209, 1)">
                    <h4 style="color: rgba(67, 149, 209, 1);">Kategori yang paling laku</h4>
                    <div class="d-flex justify-content-center" id="categoryLoad">
                        <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="w-50 mx-auto h-100">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="border rounded p-3 h-100">
                    <h4>Penjualan Berdasarkan Platform</h4>
                </div>
            </div>
        </div>
    </section>
    <section class="p-3 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="rounded p-3" style="border: 1px solid rgba(224, 84, 84, 1); background:rgba(224, 84, 84, 0.1)">
                    <h4 style="color: rgba(224, 84, 84, 1);">Statistik Penjualan</h4>
                    <div class="d-flex justify-content-center" id="statisticLoad">
                        <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="w-50 mx-auto">
                        <canvas id="statisticChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('body-scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        $(document).ready(function() {
            bestSellingCategory();
            transactionStatistic();
        });

        function bestSellingCategory() {
            $.ajax({
                url: '{{ route('dashboard.data') }}',
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function beforeSend() {

                },
                success: function success(result) {
                    if (result.code == 200) {
                        $('#categoryLoad').remove();
                        new Chart($('#categoryChart'), {
                            type: 'pie',
                            data: {
                                labels: Object.keys(result.data),
                                datasets: [{
                                    labels: Object.keys(result.data),
                                    data: Object.values(result.data),
                                }]
                            },
                            options: {

                            }
                        });
                        Swal.close();
                    } else {
                        swalWarning(result);
                    }
                },
                error: function error(result) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi Kesalahan!'
                    });
                }
            });
        }

        function transactionStatistic() {
            $.ajax({
                url: '{{ route('dashboard.statistic') }}',
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function beforeSend() {

                },
                success: function success(result) {
                    if (result.code == 200) {
                        $('#statisticLoad').remove();
                        new Chart($('#statisticChart'), {
                            type: 'line',
                            data: {
                                labels: result.data.map(obj => obj.created_date),
                                datasets: [{
                                    labels: result.data.map(obj => obj.created_date),
                                    data: result.data.map(obj => obj.count),
                                    borderColor: "#E05454",
                                    backgroundColor: "#e755ba",
                                    pointBackgroundColor: "#E05454",
                                    pointBorderColor: "#E05454",
                                    pointHoverBackgroundColor: "#E05454",
                                    pointHoverBorderColor: "#E05454",
                                }],
                                tension: 0.4,
                                fill: true

                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                        Swal.close();
                    } else {
                        swalWarning(result);
                    }
                },
                error: function error(result) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi Kesalahan!'
                    });
                }
            });
        }
    </script>
@endpush
