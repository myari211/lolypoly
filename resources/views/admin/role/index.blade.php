@extends('layouts.admin.app', ['title' => 'Roles','parent' => 'Apps Management'])

@section('title', 'Roles')

@section('content')
	<section class="content">
		<div id="main-content">
			<div id="content-header">
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa-solid fa-circle-plus"></i> Add Role</button>
			</div>
			
			<table id="table-all" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<!-- <th>Parent</th> -->
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
		<form action="{{route('roles.store')}}" id="submit-form">
			<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<div class="form-group">
						<label for="name">Name*</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" data-validation="required">
					</div>
					<div class="form-group">
						<label for="parent_id">Can Acces Menu</label>
						<table class="table table-bordered" cellspacing="0" width="100%">
						@foreach($data_menus as $parent)
							@if($parent->has_child)
								<tr>
									<th colspan="2" style="background-color: #007bff;color: #fff;margin: auto;text-align: center;">{{$parent->name}}</th>
								</tr>
								<!-- <h5 style="font-size: 1rem;">{{$parent->name}}</ style="font-size: 1rem;"> -->
								<div class="menu-child" style="margin-left:15px;">
								@foreach($parent->child as $child)
									<tr>
										<td width="10">
											<input class="form-check-input position-static" type="checkbox" name="menu_id[]" id="menu_id_{{$child->id}}" value="{{$child->id}}" aria-label="..." style="margin:auto">
										</td>
										<td>
											{{$child->name}}
										</td>
									</tr>
									<!-- <div class="form-check">
										<input class="form-check-input position-static" type="checkbox" name="menu_id[]" id="menu_id_{{$child->id}}" value="{{$child->id}}" aria-label="...">
										<label class="form-check-label" for="menu_id_{{$child->id}}">
											{{$child->name}}
										</label>
									</div> -->
								@endforeach
								</div>
							@else
								<tr>
									<td width="10">
										<input class="form-check-input position-static" type="checkbox" name="menu_id[]" id="menu_id_{{$parent->id}}" value="{{$parent->id}}" aria-label="..." style="margin:auto">
									</td>
									<td style="background-color: #007bff;color: #fff;margin: auto;text-align: center;">
									{{$parent->name}}
									</td>
								</tr>
								<!-- <div class="form-check">
									<input class="form-check-input position-static" type="checkbox" name="menu_id[]" id="menu_id_{{$parent->id}}" value="{{$parent->id}}" aria-label="...">
									<label class="form-check-label" for="menu_id_{{$parent->id}}">
										{{$parent->name}}
									</label>
								</div> -->
							@endif
						@endforeach
						</table>
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
				"url": "{{ route('roles.getAll') }}",
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
				{ data: "action", name: "action", className:"class-action tail-right"},
			]
		});
	</script>
@endpush