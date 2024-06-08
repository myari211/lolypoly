@extends('layouts.admin.app', ['title' => 'Custom Case','parent' => 'Custom Case'])

@section('title', 'Edit Custom Case')

@section('content')
<section class="content">
	<div id="main-content">
		<!-- <ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link tab-pane-font active" href="#product-master" role="tab" data-toggle="tab">Case</a>
			</li>
			<li class="nav-item">
				<a class="nav-link tab-pane-font product-variant-tab" href="#product-variant" style="display: none;" role="tab" data-toggle="tab">Case Color</a>
			</li>
		</ul> -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active show" id="product-master">
				<form action="{{ route('product.custom.update', ['id' => $data_product]) }}" id="submit-form" >
					<input type="hidden" name="id" id="id" value="{{ $data_product->id }}">
					
					<div class="row">
						<div class="col-md-3">
							<label for="title">Image Thumbnail</label>
							<div class="row" id="list-image-thumbnail">
								<div class="wrapper col-md-12 item-image-1">
									<div class="box" style="margin: 0">
										<div class="js--image-preview js--no-default" style="background-image: url('{{ $data_product->image_url }}') "></div>
										<div class="upload-options">
											<label>
												<input type="file" name="images_thumbnail" class="image-upload" accept="image/*">
												<input type="text" class="form-control" id="image_file" name="image_file" value="{{ $data_product->image }}" hidden>
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
										<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ $data_product->title }}" data-validation="required">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="brand_id">Brand*</label>
										<select class="select2-multiple form-control" name="brand_id[]" id="brand_id" data-validation="required" data-validation="required">
											<option value="">-- Select Brand --</option>
											@foreach((new \App\Helpers\GeneralFunction)->getAllBrand() as $brand)
											@if($brand->has_child)
											<optgroup label="{{$brand->title}}">
												@foreach($brand->child as $child)
												<option value="{{$child->id}}" {{ $child->id == $data_product->brand_id ? 'selected' : '' }}>{{$child->title}}</option>
												@endforeach
											</optgroup>
											@else
											<option value="{{$brand->id}}" {{ $brand->id == $data_product->brand_id ? 'selected' : '' }}><strong>{{$brand->title}}</strong></option>
											@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="price">Price</label>
										<input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" value="{{ $data_product->price }}" min="0" step="0.01">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Weight (Gram)</label>
										<input type="text" name="weight" id="weight" class="form-control numeric-mask" placeholder="Enter Product Weight" data-validation="required" value="{{$data_product->weight}}">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="description">Description*</label>
										<textarea class="form-control summernote" id="description" name="description" placeholder="Enter Description" data-validation="required">{{ $data_product->description }}</textarea>
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
							@foreach($data_product->productImage as $key => $productImage)
							<div class="wrapper col-md-3 item-image-{{$key}}" id="upload-photo">
								<div class="box" style="margin: 0">
									<div class="js--image-preview js--no-default" style="background-image: url('{{ $productImage->image_url }}') "></div>
									<div class="upload-options">
										<label>
											<input type="file" name="images[]" class="image-upload" accept="image/*" value="{{ $productImage->image }}">
										</label>
									</div>
								</div>
								<button type="button" class="btn btn-danger" onclick="deleteRow('{{$key}}')" style="width: 300px;margin: 5px 0 15px;"><i class="fas fa-times-circle"></i> Remove</button>
							</div>
							@endforeach
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-primary" id="add-image" data-id="{{count($data_product->productImage)}}" style="margin:15px 0;"><i class="fas fa-plus-circle"></i> Add Product Image</button>
							</div>
						</div>
					</div>
					
					<div class="modal-footer">
						<a type="role" class="btn btn-secondary" data-dismiss="modal" href="{{route('product.index')}}">Cancel</a>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="product-variant">
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd" style="margin-bottom:35px;" id="addvarian"><i class="fa-solid fa-circle-plus"></i> Add Variant</button>
				<table id="table-all" class="table table-striped table-bordered" style="width:100%; margin-top:35px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Image Thumbnail</th>
							<th>Type Name</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>

	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="modalAdd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAddLabel">Add Case Color</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('product.custom.addVariant')}}" id="submit-form-variant">
				<div class="modal-body">
					<input type="hidden" name="id" id="id" value="">
					<input type="hidden" name="data_variant_id" id="data_variant_id" value="">
					<input type="hidden" name="data_type_id" id="data_type_id" value="">
					<input type="hidden" name="product_id" id="product_id" value="{{ $data_product->id }}">
					<div class="row">
						<div class="col-md-4">
							<label for="title">Image Thumbnail</label>
							<div class="row" id="list-image-thumbnail">
								<div class="wrapper col-md-12 item-image-color">
									<div class="box" style="margin: 0">
										<div class="js--image-preview js--no-default" id="thumb-image-color" style="background-image: url('{{ $data_product->image_url }}') "></div>
										<div class="upload-options">
											<label>
												<input type="file" name="images_thumbnail" class="image-upload" accept="image/*">
												<input type="text" class="form-control" id="image_file" name="image_file" value="{{ $data_product->image }}" hidden>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label for="type">Name*</label>
								<input type="text" class="form-control" id="type" name="type" placeholder="Enter Type" data-validation="required">
								<span>*If Type Has as least one Variant, Variant Cannot be Empty</span>
							</div>
						</div>
					</div>
					
					<div id="upload-image">
						<div class="row">
							<div class="col-md-12">
								<label for="title">Case Color Image</label>
							</div>
						</div>
						<div class="row" id="list-image-color">
							@foreach($data_product->productImage as $key => $productImage)
							<div class="wrapper col-md-4 item-image-color-{{$key}}" id="upload-photo">
								<div class="box" style="margin: 0">
									<div class="js--image-preview js--no-default" style="background-image: url('{{ $productImage->image_url }}') "></div>
									<div class="upload-options">
										<label>
											<input type="file" name="images[]" class="image-upload" accept="image/*" value="{{ $productImage->image }}">
										</label>
									</div>
								</div>
								<button type="button" class="btn btn-danger" onclick="deleteRowColor('{{$key}}')" style="width: 300px;margin: 5px 0 15px;"><i class="fas fa-times-circle"></i> Remove</button>
							</div>
							@endforeach
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-primary" id="add-image-color" data-id="{{count($data_product->productImage)}}" style="margin:15px 0;"><i class="fas fa-plus-circle"></i> Add Case Color Image</button>
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
<script>
	$(document).ready(function() {
        $('#addvarian').click(function() {
            // Clear the form fields
            $('#submit-form-variant')[0].reset();
        });
    });

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

	$(document).on('click', '#add-image-color', function (e) {
		e.preventDefault();
		$('.fix-loading').fadeIn();
		var data_id = $(this).data('id');
			// console.log(data_id);
		html = '<div class="wrapper col-md-4 list-item-image-color item-image-color-'+data_id+'" id="upload-photo">';
		html += '<div class="box" style="margin: 0">';
		html += '<div class="js--image-preview"></div>';
		html += '<div class="upload-options">';
		html += '<label>';
		html += '<input type="file" name="images[]" class="image-upload" accept="image/*" />';
		html += '</label>';
		html += '</div>';
		html += '</div>';
		html += '<button type="button" class="btn btn-danger" onclick="deleteRowColor('+data_id+')" style="width: 300px;margin: 5px 0 15px;"><i class="fas fa-times-circle"></i> Remove</button>';
		html += '</div>';
		var new_data_id = data_id+1;
		$('#add-image-color').data('id', new_data_id);
		$('#list-image-color').append(html);
		$('.fix-loading').fadeOut();
		setbox(html);
	});
	function deleteRow(i){
		$('.item-image-'+i).remove();
	}
	function deleteRowColor(i){
		$(' list-item-image-color.item-image-color-'+i).remove();
	}
	
	$(document).on('change', '.product-variant-checkbox', function (e) {
		e.preventDefault();
		hasVariant($(this).is(":checked"));
		if($(this).is(":checked")){
			$('.product-variant-tab').fadeIn();
		} else {
			$('.product-variant-tab').fadeOut();
		}
	});

	function hasVariant(hasVariant){
		var form_data = { 'product_id' : "{{ $data_product->id }}", 'hasVariant' : hasVariant};
		$.ajax({
			url: "{{route('product.hasVariant')}}",
			type: "POST",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: form_data,
			dataType: "JSON",
			beforeSend: function beforeSend() {
				Swal.showLoading();
			},
			success: function success(result) {
				if (result.code == 200) {
					Swal.close();
				} else {
					swalWarning(result);
				}
			},
			error: function error(result) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Terjadi Kesalahan!'
				});
			}
		});
	}

	var table = $("#table-all").DataTable({
		"serverSide": "true",
		"processing": "true",
		"ordering": false,
		"searching": true,
		"autoWidth": true,
		"ajax": {
			"url": "{{ route('product.custom.getAllVarian', $data_product->id) }}",
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
			{ data: "thumb_image", name: "thumb_image", className:"clickable-order"},
			{ data: "title", name: "title", className:"clickable-order"},
			{ data: "price", name: "price", className:"clickable-order"},
			{ data: "action", name: "action", className:"class-action tail-right"},
			]
	});

	$(document).on("click", ".edit-color-button", function () {
		var id = $(this).data("id");
		var url = $(this).data("url");
		if ($(".btn-startcall").length > 0) {
			$(".btn-startcall").fadeIn();
		}
		$.ajax({
			url: url,
			type: "GET",
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			// data: dataForm,
			dataType: "JSON",
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function beforeSend() {
				Swal.showLoading();
			},
			success: function success(result) {
				if (result.code == 200) {
					$.each(result.data, function (key, val) {
						var ele = $("#" + key);
						var check_ele = ele.length;
						if (check_ele > 0) {
							var check_text = ele.hasClass("edit-text");
							if (check_text) {
								ele.text(val);
							} else {
								var check_select2 = ele.hasClass("select2");
								if (check_select2) {
									ele.val(val).trigger("change");
								} else {
									ele.val(val);
								}
							}
						}
					});
					$('#thumb-image-color').attr("style", "background-image: url("+result.data.image_url+")");
					var productImage = result.data.productImage;
					$.each(productImage, function (keyImage, image) {
						var data_id = keyImage;
						var base_url = window.location.origin;
							// console.log(data_id);
						html = '<div class="wrapper col-md-4 list-item-image-color item-image-color-'+data_id+'" id="upload-photo">';
						html += '<div class="box" style="margin: 0">';
						html += '<div class="js--image-preview js--no-default" style="background-image: url('+base_url+'/'+image.image+') "></div>';
						html += '<div class="upload-options">';
						html += '<label>';
						html += '<input type="file" name="images[]" class="image-upload" accept="image/*" />';
						html += '</label>';
						html += '</div>';
						html += '</div>';
						html += '<button type="button" class="btn btn-danger" onclick="deleteRowColor('+data_id+')" style="width: 300px;margin: 5px 0 15px;"><i class="fas fa-times-circle"></i> Remove</button>';
						html += '</div>';
						var new_data_id = data_id+1;
						$('#add-image-color').data('id', new_data_id);
						$('#list-image-color').append(html);
					});
					$("#modalAdd").modal("show");
					Swal.close();
				} else {
					swalWarning(result);
				}
			},
			error: function error(result) {
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Terjadi Kesalahan!",
				});
			},
		});
	});
	
	$("#modalAdd").on("hidden.bs.modal", function () {
		$('#thumb-image-color').attr("style", "background-image: url('')");
		$('.list-item-image-color').remove();
		$('#add-image-color').data('id', '0');
	});
	// new code
	const checkbox = document.querySelector('.product-variant-checkbox');
		const minStockInput = document.querySelector('#min_stock');
		const stockInput = document.querySelector('#stock');
		const priceInput = document.querySelector('#price');

		function checkCheckboxStatus() {
			const isCheckboxChecked = checkbox.checked;
			console.log(isCheckboxChecked);

			minStockInput.readOnly = isCheckboxChecked;
			stockInput.readOnly = isCheckboxChecked;
			priceInput.readOnly = isCheckboxChecked;

			if (isCheckboxChecked === false) {
             // Increment min stock
				$('#increment-min-stock').click(function() {
					var minStockInput = $('#min_stock');
					var minStockValue = parseInt(minStockInput.val()) || 0;
					minStockInput.val(minStockValue + 1);
				});
			// Increment min stock
				$('#increment-min-stocks').click(function() {
					var minStockInput = $('#stock');
					var minStockValue = parseInt(minStockInput.val()) || 0;
					minStockInput.val(minStockValue + 1);
				});

    		// Decrement min stock
				$('#decrement-min-stock').click(function() {
					var minStockInput = $('#min_stock');
					var minStockValue = parseInt(minStockInput.val()) || 0;
					if (minStockValue > 0) {
						minStockInput.val(minStockValue - 1);
					}
				});
			// Decrement min stock
				$('#decrement-min-stocks').click(function() {
					var minStockInput = $('#stock');
					var minStockValue = parseInt(minStockInput.val()) || 0;
					if (minStockValue > 0) {
						minStockInput.val(minStockValue - 1);
					}
				});
			}
		}
		checkbox.addEventListener('change', checkCheckboxStatus);
		// Call the function on page load
		checkCheckboxStatus();

</script>
@endpush