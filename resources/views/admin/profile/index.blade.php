@extends('layouts.admin.app', ['title' => 'Profile','parent' => ''])

@section('title', 'Profile')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form id="submit-form" action="{{ route('profile.store') }}">
                <div class="row m-0">
                    <div class="col-sm-4 mb-3">
                        <div id="upload-photo">
                            <div class="box">
                                <div class="js--image-preview js--no-default" style="background-image: url('{{$data->avatar_url}}') "></div>
                                <!-- <div class="js--image-preview js--no-default"></div> -->
                                <div class="upload-options">
                                <label>
                                    <input type="file" name="avatar" class="image-upload" accept="image/*" />
                                </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 mb-3">
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" placeholder="Enter Name" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" placeholder="Enter Email" data-validation="required">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number*</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $data->phone_number }}" placeholder="Enter Phone Number" data-validation="required">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 mb-4" style="width:100%">Submit</button>
                    </div>
                </div>
            </form>
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