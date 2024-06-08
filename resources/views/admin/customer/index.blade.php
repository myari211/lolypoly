@extends('layouts.admin.app', ['title' => 'Customer', 'parent' => 'customer'])

@section('title', 'Customer')

@section('content')
    <section class="content">
        <div id="main-content">
            <div id="content-header">
            </div>
            <table id="table-all" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>PhoneNumber</th>
                        <th>Image</th>
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
                "url": "{{ route('customer.getAll') }}",
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
                    data: "email",
                    name: "email",
                    className: "clickable-order"
                },
                {
                    data: "phone_number",
                    name: "phone_number",
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
                    data: "action",
                    name: "action",
                    className: "class-action tail-right"
                },
            ]
        });
    </script>
@endpush
