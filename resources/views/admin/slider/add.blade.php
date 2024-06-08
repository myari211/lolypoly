@extends('layouts.admin.app', ['title' => 'List','parent' => 'slider'])

@section('title', 'Add Slider')


@section('content')
	<section class="content">
		<div id="main-content">
			<form action="{{route('slider.store')}}" id="submit-form">
				<input type="hidden" name="id" id="id" value="">
				
				<div class="row mb-5">
					<div class="col-md-5">
						<label for="title">Image Slider</label>
						<div class="row" id="list-image-thumbnail">
							<div class="wrapper col-md-12 item-image-1">
								<div class="box" style="margin: 0;max-width: 500px">
									<div class="js--image-preview"></div>
									<div class="upload-options">
										<label>
											<input type="file" name="images_thumbnail" class="image-upload" accept="image/*">
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="name">Name*</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" data-validation="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="order">Order*</label>
									<input type="text" class="form-control" id="order" name="order" placeholder="Enter Order" data-validation="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="order">URL*</label>
									<input type="text" class="form-control" id="url" name="url" placeholder="Enter URL" data-validation="required">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="{{ route('slider.index') }}" class="btn btn-secondary">Cancel</a>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</section>
@endsection

@push('body-scripts')
	<script>
		
	</script>
@endpush