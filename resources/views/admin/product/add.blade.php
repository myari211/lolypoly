@extends('layouts.admin.app', ['title' => 'List','parent' => 'Product'])

@section('title', 'Add Product')

@section('content')
	<section class="content">
		<div id="main-content" class="pr-5 pl-5">
			{{-- <form action="{{ route('product.store')}}" id="submit-form">
				<input type="hidden" name="id" id="id" value="">
				<div class="row mt-4" id="list-image-thumbnail">
					<div class="col-md-3">
						<div class="rounded-circle z-depth-1">
							<div class="js--image-preview rounded-circle"></div>
							<div class="upload-options">
								<label>
									<input type="file" name="images_thumbnail" class="image-upload" accept="image/*">
								</label>
							</div>
						</div>
					</div>
					<div class="col-md-8 offset-1">
						<div class="row mt-4">
							<div class="col-12">
								<h3 class="d-flex align-items-center">
									Product Description
								</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<hr />
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Name*</label>
									<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" data-validation="required" style="height: 50px">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="category_id">Category*</label>
									<select class="select2-multiple form-control" name="category_id[]" id="category_id" data-validation="required" multiple="multiple" style="height: 50px !important;">
										<option value="">-- Select Category --</option>
										@foreach((new \App\Helpers\GeneralFunction)->getAllCategory() as $category)
											@if(count($category->child) > 0)
												<optgroup label="{{$category->title}}">
													@foreach($category->child as $child)
														<option value="{{$child->id}}">{{$child->title}}</option>
													@endforeach
												</optgroup>
											@else
												<option value="{{$category->id}}"><strong>{{$category->title}}</strong></option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="price">Price</label>
									<input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" min="0" step="0.01" style="height: 50px;">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Weight (Gram)</label>
									<input type="text" name="weight" id="weight" class="form-control numeric-mask" placeholder="Enter Product Weight" data-validation="required" style="height: 50px">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="min_stock">Min Stock</label>
									<div class="input-group">
										<input type="number" class="form-control" id="min_stock" name="min_stock" placeholder="Enter Min Stock" min="1" style="height: 50px">
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
										<input type="number" class="form-control" id="stock" name="stock" placeholder="Enter Stock" min="1" style="height: 50px">
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
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="description">Description*</label>
									<textarea class="form-control summernote" id="description" name="description" placeholder="Enter Description" data-validation="required"></textarea>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-lg-12 d-flex justify-content-between">
								<h3>Product Variant</h3>
								<button type="button" class="btn btn-outline-primary rounded-pill btn-lg z-depth-0 d-flex align-items-center" data-toggle="modal" data-target="#ModalVariant">
									<i class="fas fa-plus mr-2"></i>
									Variant
								</button>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<hr />
							</div>
						</div>
						<div class="row mt-3" style="min-height: 300px">
							<div class="col-12 d-flex justify-content-center align-items-center">
								<div>
									<h5 class="text-muted">-- This Product doesn't have any variant. Press the button "+ Variant" for adding -- </h5>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 d-flex justify-content-between">
								<h3>Product Image</h3>
								<button type="button" class="btn btn-outline-primary rounded-pill btn-lg z-depth-0 d-flex align-items-center">
									<i class="fas fa-plus mr-2"></i>
									Image
								</button>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<hr />
							</div>
						</div>
						<div class="row mt-3" style="min-height: 300px">
							<div class="col-12 d-flex justify-content-center align-items-center">
								<div>
									<h5 class="text-muted">-- This Product doesn't have any image. Press the button "+ Image" for adding -- </h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form> --}}
			<form action="{{route('product.store')}}" id="submit-form">
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
									<label for="category_id">Category*</label>
									<select class="select2-multiple form-control" name="category_id[]" id="category_id" data-validation="required" multiple="multiple">
										<option value="">-- Select Category --</option>
										@foreach((new \App\Helpers\GeneralFunction)->getAllCategory() as $category)
											@if(count($category->child) > 0)
												<optgroup label="{{$category->title}}">
													@foreach($category->child as $child)
														<option value="{{$child->id}}">{{$child->title}}</option>
													@endforeach
												</optgroup>
											@else
												<option value="{{$category->id}}"><strong>{{$category->title}}</strong></option>
											@endif
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Weight (Gram)</label>
									<input type="text" name="weight" id="weight" class="form-control numeric-mask" placeholder="Enter Product Weight" data-validation="required">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="description">Description*</label>
									<textarea class="form-control summernote" id="description" name="description" placeholder="Enter Description" data-validation="required"></textarea>
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
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="button" class="btn btn-primary" id="add-image" data-id="2" style="margin:15px 0;"><i class="fas fa-plus-circle"></i> Add Product Image</button>
						</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</section>
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