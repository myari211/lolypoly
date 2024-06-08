@extends('layouts.admin.app', ['title' => 'Slider','parent' => 'slider'])

@section('title', 'Slider')

@section('content')
	<section class="content">
		<div id="main-content">
			<div id="content-header">
				<a href="{{ route('slider.create') }}" class="btn btn-outline-primary"><i class="fa-solid fa-circle-plus"></i> Add Slider</a>
			</div>
			<table id="table-all" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Order</th>
						<th>Image</th>
						<th>URL</th>
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
				"url": "{{ route('slider.getAll') }}",
				"type": "GET",
				"datatype": "JSON",
			},
			"columns": [
				{ data: "DT_RowIndex", name: "DT_RowIndex", className:'tail-left clickable-order'},
				{ data: "name", name: "name", className:"clickable-order"},
				{ data: "order", name: "order", className:"clickable-order"},
				{
					data: "image",
					name: "image",
					className: "clickable-order",
					render: function(data, type, row) {
						return '<img src="' + data +'" style="width: 100px; height: auto;" alt="Image" />';
					}
				},
				{data: 'url', name: "url", className:"clickable-order"},
				{ data: "action", name: "action", className:"class-action tail-right"},
			]
		});
	</script>
@endpush