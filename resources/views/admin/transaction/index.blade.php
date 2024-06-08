@extends('layouts.admin.app', ['title' => 'transaction','parent' => 'Master'])

@section('title', 'Transaction')

@section('content')
	<section class="content">
		<div id="main-content">
			<div id="content-header">
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa-solid fa-circle-plus"></i> Add Transaction</button>
			</div>
			
			<table id="table-all" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Order ID</th>
                        <th>Customer</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>

		</div>
	</section>

	<!-- Modal -->
	<!-- <div class="modal fade" id="modalAdd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modalAddLabel">Store</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{route('store.store')}}" id="submit-form">
			<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="title">Name*</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" data-validation="required">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Phone*</label>
								<input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone" data-validation="required">
							</div>
							<div class="form-group">
								<label for="latitude">Latitude*</label>
								<input type="text" class="form-control" id="latitude" name="latitude" placeholder="Enter Latitude" data-validation="required">
							</div>
							<div class="form-group">
								<label for="longitude">Longitude*</label>
								<input type="text" class="form-control" id="longitude" name="longitude" placeholder="Enter Longitude" data-validation="required">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="address">Address*</label>
								<textarea name="address" id="address" class="form-control" cols="30" rows="10" placeholder="Enter Address" data-validation="required"></textarea>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
		</div>
	</div> -->
	</div>
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
				"url": "{{ route('transaction.getAll') }}",
				"type": "GET",
				"datatype": "JSON",
				// "data": function data(d) {
				//     d.filter = $('input[name=filter_json]').val();
				//     d.start_from = $('input[name=start_from]').val();
				//     d.start_to = $('input[name=start_to]').val();
				// }
			},
			"columns": [
				{ data: "DT_RowIndex", name: "DT_RowIndex", className:'tail-left clickable-order'},
				{ data: "transaction_code", name: "transaction_code", className:"clickable-order"},
				{ data: "customer_name", name: "customer_name", className:"clickable-order"},
				{ data: "payment_method", name: "payment_method", className:"clickable-order"},
				{ data: "status_name", name: "status_name", className:"clickable-order"},
				{ data: "total", name: "total", className:"clickable-order"},
				{ data: "date", name: "date", className:"clickable-order"},
				{ data: "action", name: "action", className:"class-action tail-right"},
			]
		});

	</script>
@endpush