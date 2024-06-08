@extends('layouts.admin.app', ['title' => 'Promo', 'parent' => 'promo'])

@section('title', 'Promo')

@section('content')
    <section class="content">
        <div id="main-content">
            <div id="content-header">
                <a href="{{ route('promo.create') }}" class="btn btn-outline-primary"><i class="fa-solid fa-circle-plus"></i>
                    Add Promo</a>
            </div>
            <table id="table-all" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Code</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Popup</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </section>
@endsection
@push('body-scripts')
    <script>
        $("#table-all").DataTable({
            "serverSide": "true",
            "processing": "true",
            "ordering": false,
            "searching": true,
            "autoWidth": true,
            "ajax": {
                "url": "{{ route('promo.getAll') }}",
                "type": "GET",
                "datatype": "JSON",
            },
            "columns": [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    className: 'tail-left clickable-order'
                },
                {
                    data: "title",
                    name: "title",
                    className: "clickable-order"
                },
                {
                    data: "code",
                    name: "code",
                    className: "clickable-order"
                },
                {
                    data: "image",
                    name: "image",
                    className: "clickable-order",
                    render: function(data, type, row) {
                        return '<img src="' + data + '" style="width: 100px; height: auto;" alt="Image" />';
                    }
                },
                {
                    data: "date",
                    name: "date",
                    className: "clickable-order"
                },
                {
                    data: "popup",
                    name: "popup",
                    className: "clickable-order"
                },

                {
                    data: "action",
                    name: "action",
                    className: "class-action tail-right"
                },
            ]
        });

        function updatePopup(id) {
            $.ajax({
                url: '{{ route('promo.popup') }}',
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    promo_id: id
                },
                dataType: "JSON",
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function success(result) {
                    if (result.code == 200) {
                        console.log(result);
                        Swal.close();
                    }  else {
                        swalWarning(result);
                    }
                },
                error: function error(result) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Terjadi Kesalahan!",
                    });
                },
            });
        }
    </script>
@endpush
