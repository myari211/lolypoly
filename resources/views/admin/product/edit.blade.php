@extends('layouts.admin.app', ['title' => 'List','parent' => 'Product'])

@section('title', 'Edit Product')

@section('content')
<section class="content">
	<div id="main-content">
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link tab-pane-font active" href="#product-master" role="tab" data-toggle="tab">Product</a>
			</li>
			<li class="nav-item">
				<a class="nav-link tab-pane-font product-variant-tab" href="#product-variant" role="tab" data-toggle="tab" style="display:{{ $data_product->flag == 1 ? 'block' : 'none' }};">Product Variant</a>
			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active show" id="product-master">
				<form action="{{ route('product.update', ['id' => $data_product]) }}" id="submit-form" >
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
								<div class="col-md-12">
									<label class="container-checkbox">Have Variant
										<input type="checkbox" name="hasvariant" class="product-variant-checkbox" {{ $data_product->flag == 1 ? 'checked' : '' }}>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">Name*</label>
										<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{ $data_product->title }}" data-validation="required">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="category_id">Category*</label>
										<select class="select2-multiple form-control" name="category_id[]" id="category_id" data-validation="required" multiple="multiple" data-validation="required">
											<option value="">-- Select Category --</option>
											@foreach($data_category as $category)
											@if($category->has_child)
											<optgroup label="{{$category->title}}">
												@foreach($category->child as $child)
												<option value="{{$child->id}}" {{ $child->selected ? 'selected' : '' }}>{{$child->title}}</option>
												@endforeach
											</optgroup>
											@else
											<option value="{{$category->id}}" {{ $category->selected ? 'selected' : '' }}><strong>{{$category->title}}</strong></option>
											@endif
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="min_stock">Min Stock</label>
										<div class="input-group">
											<input type="number" class="form-control" id="min_stock" name="min_stock" placeholder="Enter Min Stock" value="{{ $data_product->min_stock }}" min="1">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" id="decrement-min-stock">
													<i class="fas fa-caret-down"></i>
												</button>
												<button class="btn btn-outline-secondary" type="button" id="increment-min-stock">
													<i class="fas fa-caret-up"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="stock">Stock</label>
										<div class="input-group">
											<input type="number" class="form-control" id="stock" name="stock" placeholder="Enter Stock" value="{{ $data_product->stock }}" min="1">
											<div class="input-group-append">
												<button class="btn btn-outline-secondary" type="button" id="decrement-min-stocks">
													<i class="fas fa-caret-down"></i>
												</button>
												<button class="btn btn-outline-secondary" type="button" id="increment-min-stocks">
													<i class="fas fa-caret-up"></i>
												</button>
											</div>
										</div>
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
							<div class="row mt-4">
								<div class="col-lg-12 d-flex justify-content-between">
									<h4>Variant</h4>
									<button type="button" class="btn btn-md rounded btn-primary" data-toggle="modal" data-target="#ModalVariant">Add Variant</button>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div id="variant" class="row"></div>
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
							<th>Type Name</th>
							<th>Type Variant</th>
							<th>Min Stock</th>
							<th>Stock</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="references">ccc</div>
		</div>

	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="modalAdd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAddLabel">Add Variant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('product.addVariant')}}" id="submit-form-variant">
				<div class="modal-body">
					<input type="hidden" name="data_variant_id" id="data_variant_id" value="">
					<input type="hidden" name="data_type_id" id="data_type_id" value="">
					<input type="hidden" name="product_id" id="product_id" value="{{ $data_product->id }}">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="type">Type*</label>
								<input type="text" class="form-control" id="type" name="type" placeholder="Enter Type" data-validation="required">
								<span>*If Type Has as least one Variant, Variant Cannot be Empty</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="variant">Variant</label>
								<input type="text" class="form-control" id="variant" name="variant" placeholder="Enter Variant">
								<span>*If Empty Variant Stock to Type</span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="min_stock_variant">Min Stock*</label>
								<input type="text" class="form-control" id="min_stock_variant" name="min_stock_variant" placeholder="Enter Min Stock" data-validation="required">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="stock_variant">Stock*</label>
								<input type="text" class="form-control" id="stock_variant" name="stock_variant" placeholder="Enter Stock" data-validation="required">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="price_variant">Price*</label>
								<input type="text" class="form-control" id="price_variant" name="price_variant" placeholder="Enter Price" data-validation="required">
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

<!-- Modal -->
<div class="modal fade" id="ModalVariant" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAddLabel">Add Variant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label>Variant</label>
							<select class="form-control" id="ChooseVariant" style="height: 50px;" onChange="ChangeVariant()">
								<option value="general">General</option>
								<option value="color">Color</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label>Variant Name</label>
						<input type="text" class="form-control rounded" name="name_variant" id="NameVariant" style="height: 50px" placeholder="Ex: Size, Case, etc.">
					</div>
					<div class="col-6">
						<label>Variant</label>
						<input name="variant" class="form-control" id="Variant" style="height: 50px;" placeholder="Input value here">
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 d-flex justify-content-end">
						<button type="button" class="btn btn-md rounded btn-outline-primary z-depth-0 rounded-pill" onClick="AddVariant()">
							<i class="fas fa-plus"></i>
							Add Variant
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('body-scripts')
<script type="text/javascript">
	let data = [];

function ChangeVariant(e) {
	var Variant = $('#ChooseVariant').val();

	if(Variant == 'color') {
		$('#variant').attr('type', 'color');
	}
	else {
		$('#variant').attr('type', 'text');
		$('#variant').attr('value', '');
	}
}

function AddVariant() {
	var Variant = $('#ChooseVariant').val();
	var VariantName = $('#NameVariant').val();
	var VariantValue = $('#Variant').val();

	if(VariantName && VariantValue) {
		data.push(
			{
				"variant" : Variant,
				"name_variant": VariantName,
				"variant_value": VariantValue,
			}
		);
		
		showingVariant();
		closeModal();
		console.log(data);
	}
	else {
		alert('ada data yang kosong ketika Add Variant!');
	}
}

function closeModal() {
	$('#ModalVariant').modal('hide');
	$('#ChooseVariant').val();
	$('#NameVariant').val();
	$('#Variant').val();
}

function showingVariant() {
	$('#variant').empty(); // Mengosongkan elemen sebelum menambahkan elemen baru
	data.forEach(function(datas) {
		$('#variant').append(
			"<div class='col-lg-3'>" +
				"<div class='card'>" +
					"<input type='text' class='d-none' value='"+datas.name_variant+"' name='name_variant[]'>" +
					"<input type='text' class='d-none' value='"+datas.variant_value+"' name='variant_value[]'>" +
					"<input type='text' class='d-none' value='"+datas.variant+"' name='variant[]'>" +
					"<div class='card-body'>" +
						"<div class='row'>" +
							"<div class='col-lg-12 d-flex justify-content-between align-items-center'>" +
								"<div>" +
									"<span style='font-weight: 500' class='text-muted'>" + datas.name_variant + "</span>" +
									"<span> (" + datas.variant + ") </span>" +
								"</div>" +
								"<button type='button' class='btn btn-outline-danger rounded-pill z-depth-0' onclick='DeleteVariant(\"" + datas.variant_value + "\")'>Delete</button>" +
							"</div>" +
						"</div>" +
						"<div class='row'>" +
							"<div class='col-lg-12'>" +
								"<span class='text-primary' style='font-weight:600; font-size: 22px'>" + datas.variant_value + "</span>" +
							"</div>" +
						"</div>" +
					"</div>" +
				"</div>" +
			"</div>"
		);
	});
}

function DeleteVariant(param) {
	data = data.filter(function(item) {
		return item.variant_value !== param;
	});

	showingVariant();
}
</script>
<script>
	$(document).ready(function() {
        $('#addvarian').click(function() {
            // Clear the form fields
            $('#submit-form-variant')[0].reset();
        });

		checkVariant();
    });

	function checkVariant() {
		var productId = $('#id').val();

		$.ajax({
			method: 'GET',
			url: '/temporary/product/variant/' + productId,
			success: function(result) {
				console.log(result);
				result.data.map((item) => {
					data.push({
						"variant" : item.category,
						"name_variant" : item.name,
						"variant_value" : item.value,
					});
				})
				showingVariant();
			}
		});
	}

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
			"url": "{{ route('product.getAllVarian', $data_product->id) }}",
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
			{ data: "type_name", name: "type_name", className:"clickable-order"},
			{ data: "min_stock", name: "min_stock", className:"clickable-order"},
			{ data: "stock", name: "stock", className:"clickable-order"},
			{ data: "price_fix", name: "price_fix", className:"clickable-order"},
			{ data: "action", name: "action", className:"class-action tail-right"},
			]
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