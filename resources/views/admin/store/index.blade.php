@extends('layouts.admin.app', ['title' => 'Store','parent' => 'Master'])

@section('title', 'Store')

@section('content')
<section class="content">
	<div id="main-content">
		<div id="content-header">
			<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa-solid fa-circle-plus"></i> Add Store</button>
		</div>

		<table id="table-all" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>

	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalAdd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
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
								<textarea name="address" id="address" class="form-control" cols="30" rows="3" placeholder="Enter Address" data-validation="required"></textarea>
							</div>
							<div class="form-group">
								<select name="provinsi" id="provinsi" class="form-control select2 select2-form" data-validation="required">
									<option value="">Pilih Provinsi*</option>
									@foreach($data_provinsi as $provinsi)
									<option value="{{$provinsi->provinsi_id}}">{{$provinsi->provinsi_name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<select name="kabupatenKota" id="kabupatenKota" class="form-control select2 select2-form" data-validation="required" disabled>
									<option value="">Pilih Kabupaten / Kota*</option>
									@foreach($data_kabupaten as $kabupaten)
									<option value="{{$kabupaten->kabupaten_kota_id}}">{{$kabupaten->kabupaten_kota_name}}</option>
									@endforeach
								</select>
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
	</div>
</div>
@endsection

@push('body-scripts')
<!-- <script src="{{ asset('js/custom.js') }}"></script> -->
<script>
	$("#table-all").DataTable({
		"serverSide": "true",
		"processing": "true",
		"ordering": false,
		"searching": true,
		"autoWidth": true,
		"ajax": {
			"url": "{{ route('store.getAll') }}",
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
			{ data: "title", name: "title", className:"clickable-order"},
			{ data: "phone", name: "phone", className:"clickable-order"},
			{ data: "address", name: "address", className:"clickable-order"},
			{ data: "action", name: "action", className:"class-action tail-right"},
			]
	});

	var provinsiSelect = document.getElementById("provinsi");
	provinsiSelect.addEventListener("change", function() {
		provinsi_id= $(this).val();

		$.ajax({
			method: "POST",
			url: "{{ route('area.kabupaten_kota') }}",
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			data: {
				provinsi_id: provinsi_id
			},			
			dataType: "json",
			success: function (result) {
				if (result.isSuccess) {
					var options = '<option value="" disabled selected>Pilih Kabupaten / Kota</option>';
					result.data.forEach(function(data) {
						options += '<option value="' + data.kabupaten_kota_id + '">' + capitalizeFirstLetter(data.kabupaten_kota_name) + '</option>';
					});
					$('#kabupatenKota').html(options);
					$('#kabupatenKota').prop("disabled", false);
				} else {
					console.log('Fetch data failed');
				}
			},
			error: function (result) {
				console.log(result);
			},
		});
	});
	function capitalizeFirstLetter(string) {
		return string.toLowerCase().replace(/^.|\s\S/g, function (match) {
			return match.toUpperCase();
		});
	}

</script>
@endpush