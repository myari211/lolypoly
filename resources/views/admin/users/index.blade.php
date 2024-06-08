@extends('layouts.admin.app', ['title' => 'Users','parent' => 'Apps Management'])

@section('title', 'Users')

@section('content')
	<section class="content">
		<div id="main-content">
			<div id="content-header">
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa-solid fa-circle-plus"></i> Add Users</button>
			</div>
			
			<table id="table-all" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Email</th>
						<th>NIK</th>
						<th>Role Name</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>

		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade" id="modalAdd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modalAddLabel">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{route('users.store')}}" id="submit-form">
			<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label for="name">Name*</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" data-validation="required">
					</div>
					<div class="form-group">
						<label for="email">Email*</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" data-validation="required">
					</div>
					<div class="form-group">
						<label for="phone_number">NIK*</label>
						<input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" data-validation="required">
					</div>
					<div class="form-group">
						<label for="role_id">Role</label>
						<select class="select2" name="role_id" id="role_id">
							<option value="">-- Pilih Role --</option>
							@foreach($data_role as $role)
								<option value="{{$role->id}}">{{$role->name}}</option>
							@endforeach
						</select>
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
	<script>
		$("#table-all").DataTable({
			"serverSide": "true",
			"processing": "true",
			"ordering": false,
			"searching": true,
			"autoWidth": true,
			"ajax": {
				"url": "{{ route('users.getAll') }}",
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
				{ data: "name", name: "name", className:"clickable-order"},
				{ data: "email", name: "email", className:"clickable-order"},
				{ data: "phone_number", name: "phone_number", className:"clickable-order"},
				{ data: "role_name", name: "role_name", className:"clickable-order"},
				{ data: "action", name: "action", className:"class-action tail-right"},
			]
		});

	</script>
@endpush