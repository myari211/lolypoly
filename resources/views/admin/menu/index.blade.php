@extends('layouts.admin.app', ['title' => 'Menu','parent' => 'Apps Management'])

@section('title', 'Menu')

@section('content')
	<section class="content">
		<div id="main-content">
			<div id="content-header">
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa-solid fa-circle-plus"></i> Add Menus</button>
			</div>
			
			<table id="table-all" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Parent</th>
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
			<form action="{{route('menus.store')}}" id="submit-form">
				<div class="modal-body">
						<input type="hidden" name="id" id="id" value="">
						<div class="form-group">
							<label for="name">Name*</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" data-validation="required">
						</div>
						<div class="form-group">
							<label for="url">URL*</label>
							<input type="text" class="form-control" id="url" name="url" placeholder="Enter URL" data-validation="required">
						</div>
						<div class="form-group">
							<label for="icon">Icon*</label>
							<input type="text" class="form-control" id="icon" name="icon" placeholder="Enter Tag Font Awesome Icon" data-validation="required">
						</div>
						<div class="form-group">
							<label for="parent_id">Parent</label>
							<select class="select2" name="parent_id" id="parent_id">
								<option value="">-- Pilih Parent --</option>
								@foreach($data_menus as $menu)
									<option value="{{$menu->id}}">{{$menu->name}}</option>
								@endforeach
							</select>
							<span>*Choose Parent If This Menus Is Child</span>
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
				"url": "{{ route('menus.getAll') }}",
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
				{ data: "parent", name: "parent", className:"clickable-order"},
				{ data: "action", name: "action", className:"class-action tail-right"},
			]
		});

	</script>
@endpush