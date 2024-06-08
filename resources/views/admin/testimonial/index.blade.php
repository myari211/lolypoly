@extends('layouts.admin.app', ['title' => 'Testimonial', 'parent' => 'Testimonial'])

@section('title', 'Testimonial')

@section('content')
    <section class="content">
        <div id="main-content">
            <div id="content-header">
                <a href="{{ route('testimonial.create') }}" class="btn btn-outline-primary"><i class="fa-solid fa-circle-plus"></i>
                    Add Testimonial</a>
            </div>
            <table id="table-all" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Stars</th>
                        <th>Description</th>
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
                "url": "{{ route('testimonial.getAll') }}",
                "type": "GET",
                "datatype": "JSON",
            },
            "columns": [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    className: 'tail-left clickable-order'
                },
                {
                    data: "name",
                    name: "name",
                    className: "clickable-order"
                },
                {
                    data: "stars",
                    name: "stars",
                    className: "clickable-order"
                },
                {
                    data: "description",
                    name: "description",
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
                url: '{{ route('testimonial.popup') }}',
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
