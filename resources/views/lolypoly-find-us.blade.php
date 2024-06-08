@extends('lolypoly.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5"><b>Find Our Nearest Store</b></h1>
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control border rounded" type="text" placeholder="Seach Outlet" oninput="fetchStores()"
                        id="searchInput" style="min-height: 60px;border: 1px solid #ced4da !important;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="provinsi" id="provinsi" class="form-control select2-form">
                                <option value="" disabled selected>Pilih Provinsi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="kabupaten_kota" id="kabupatenKota" class="form-control select2-form" disabled>
                                <option value="" disabled selected>Pilih Kabupaten / Kota</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="row">
                <div class="col-md-6 h-100">
                    <div class="h-100 w-100 overflow-auto" id="storeList" style="max-height:800px">
                        @include('lolypoly.partials.store-list', ['stores' => $stores])
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="map" style="height: 800px;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.select2-form').select2({
            minimumResultsForSearch: -1,
            width: '100%'
        });
        $(document).ready(function() {
            var markersList = @json($markerList);
            var map = L.map('map').setView([markersList[0].lat, markersList[0].long], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 18
            }).addTo(map);

            // Retrieve marker data from Laravel backend
            $.each(markersList, function(index, marker) {
                L.marker([marker.lat, marker.long]).addTo(map).bindPopup(marker.title);
            });

            getProvinsiStore('#provinsi', {});
            $('#provinsi').change(function() {
                getKabupatenKotaStore('#kabupatenKota', {
                    provinsi_id: $(this).val()
                });
                $('#kabupatenKota').find("option").remove();
                $('#kabupatenKota').append(
                    '<option value="" disabled selected>Pilih Kabupaten / Kota</option>'
                ).prop("disabled", true);

                fetchStores();
            });
            $('#kabupatenKota').change(function() {
                fetchStores();
            });
        });

        function fetchStores() {
            var urlParams = new URLSearchParams(window.location.search);
            var paramValue = urlParams.get('categories');
            $.ajax({
                url: '{{ route('lolypoly.find.us') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: $('#searchInput').val(),
                    provinsi: $('#provinsi').val(),
                    kabupaten_kota: $('#kabupatenKota').val()
                },
                beforeSend: function beforeSend() {
                    $('#storeList').html(bootstrapCenterLoading());
                },
                success: function(response) {
                    $('#storeList').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function getProvinsiStore(destination, param) {
            var baseUrl = window.location.protocol + '//' + window.location.host;
            if (window.location.host == 'lolypoly.co.id') {
                var url = baseUrl + "/public/area/provinsi/store";
            } else {
                var url = baseUrl + "/area/provinsi/store";
            }
            $.ajax({
                url: url,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: param,
                dataType: "JSON",
                beforeSend: function beforeSend() {
                    $(destination).find("option").remove();
                    $(destination)
                        .append(
                            '<option value="" disabled selected>Pilih Provinsi</option>'
                        )
                        .prop("disabled", true);
                },
                success: function success(result) {
                    result.data.forEach(function(data) {
                        var option =
                            '<option value="' +
                            data.provinsi_id +
                            '">' +
                            capitalizeFirstLetter(data.provinsi_name) +
                            "</option>";
                        $(destination).append(option);
                    });
                    $(destination).prop("disabled", false);
                },
                error: function error(result) {
                    console.log(result);
                },
            });
        }

        function getKabupatenKotaStore(destination, param) {
            var baseUrl = window.location.protocol + '//' + window.location.host;
            if (window.location.host == 'lolypoly.co.id') {
                var url = baseUrl + "/public/area/kabupaten-kota/store";
            } else {
                var url = baseUrl + "/area/kabupaten-kota/store";
            }
            $.ajax({
                method: "POST",
                url: url,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: param,
                dataType: "JSON",
                beforeSend: function beforeSend() {
                    $(destination).find("option").remove();
                    $(destination).append(
                        '<option value="" disabled selected>Pilih Kabupaten / Kota</option>'
                    );
                    $(destination).prop("disabled", true);
                },
                success: function success(result) {
                    result.data.forEach(function(data) {
                        var option =
                            '<option value="' +
                            data.kabupaten_kota_id +
                            '">' +
                            capitalizeFirstLetter(data.kabupaten_kota_name) +
                            "</option>";
                        $(destination).append(option);
                    });
                    $(destination).prop("disabled", false);
                },
                error: function error(result) {
                    console.log(result);
                },
            });
        }
    </script>
@endsection
