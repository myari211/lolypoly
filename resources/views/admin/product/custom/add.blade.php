@extends('layouts.admin.app', ['title' => 'Custom Case','parent' => 'Custom Case'])

@section('title', 'Add Custom Case')

@section('content')
	<section class="content">
		<div id="main-content">
			
			<form action="{{route('product.custom.store')}}" id="submit-form">
				<input type="hidden" name="id" id="id" value="">
				
				<div class="row">
					<div class="col-md-3">
						<label for="title">Image Thumbnail</label>
						<div class="row" id="list-image-thumbnail">
							<div class="wrapper col-md-12 item-image-1">
								<div class="box" style="margin: 0">
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
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Name*</label>
									<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" data-validation="required">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="brand_id">Brand*</label>
									<select class="select2-default form-control" name="brand_id" id="brand_id" data-validation="required">
										<option value="">-- Select Brand --</option>
										@foreach((new \App\Helpers\GeneralFunction)->getAllBrand() as $brand)
											@if(count($brand->child) > 0)
												<optgroup label="{{$brand->title}}">
													@foreach($brand->child as $child)
														<option value="{{$child->id}}">{{$child->title}}</option>
													@endforeach
												</optgroup>
											@else
												<option value="{{$brand->id}}"><strong>{{$brand->title}}</strong></option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Price</label>
									<input type="text" name="price" id="price" class="form-control numeric-mask" placeholder="Enter Product Price" data-validation="required">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Weight (Gram)</label>
									<input type="text" name="weight" id="weight" class="form-control numeric-mask" placeholder="Enter Product Weight" data-validation="required">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="description">Description*</label>
									<textarea class="form-control summernote" id="description" name="description" placeholder="Enter Description" data-validation="required"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div id="upload-image">
					<div class="row">
						<div class="col-md-12">
							<label for="title">Product Image</label>
						</div>
					</div>
					<div class="row" id="list-image">
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="button" class="btn btn-primary" id="add-image" data-id="2" style="margin:15px 0;"><i class="fas fa-plus-circle"></i> Add Product Image</button>
						</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<a href="{{ route('product.custom.index') }}" class="btn btn-secondary">Cancel</a>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>

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
			</div>
		</div>
	</div>
@endsection

@push('body-scripts')
	<script>
		$(document).on('click', '#add-image', function (e) {
	        e.preventDefault();
			$('.fix-loading').fadeIn();
			var data_id = $(this).data('id');
			// console.log(data_id);
			html = '<div class="wrapper col-md-3 item-image-'+data_id+'" id="upload-photo">';
			html += '<div class="box" style="margin: 0">';
			html += '<div class="js--image-preview"></div>';
			html += '<div class="upload-options">';
			html += '<label>';
			html += '<input type="file" name="images[]" class="image-upload" accept="image/*" />';
			html += '</label>';
			html += '</div>';
			html += '</div>';
			html += '<button type="button" class="btn btn-danger" onclick="deleteRow('+data_id+')" style="width: 300px;margin: 5px 0 15px;"><i class="fas fa-times-circle"></i> Remove</button>';
			html += '</div>';
			var new_data_id = data_id+1;
			$('#add-image').data('id', new_data_id);
			$('#list-image').append(html);
			$('.fix-loading').fadeOut();
			setbox(html);
	    });
	    function deleteRow(i){
            $('.item-image-'+i).remove();
        }
	</script>
@endpush