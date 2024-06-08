@extends('layouts.admin.app', ['title' => 'Offline','parent' => 'Warehouse'])

@section('title', 'Warehouse Offline')

@section('content')
	<section class="content">
		<div id="content-header">
			<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa-solid fa-circle-plus"></i> Input Order Offline</button>
		</div>
		<div id="main-content">
			<table id="table-all" class="table table-bordered nowrap" style="width:100%;">
				<thead>
					<tr>
						<th class="bg-white">No</th>
						<th class="bg-white">Date Place</th>
						<th class="bg-white">ID Pelanggan</th>
						<th class="bg-white">Kategori</th>
						<th class="bg-white">Kategori Status</th>
						<th class="bg-white">Nama Usaha</th>
						<th class="bg-white">Nama PJ</th>
						<th class="bg-white">Jabatan</th>
						<th class="bg-white">No Tlp</th>
						<th class="bg-white">Alamat Detail</th>
						<th class="bg-white">Last Order Id</th>
						<th class="bg-white">Last Gudang</th>
						<th class="bg-white">Last Quantity(L) </th>
						<th class="bg-white">Last Quantity(Kg)</th>
						<th class="bg-white">Last Harga Satuan</th>
						<th class="bg-white">Last Kemasan</th>
						<th class="bg-white">Last Remark Status</th>
						<th class="bg-white">Keterangan Detail</th>
						<!-- <th class="bg-white">Action</th> -->
					</tr>
				</thead>
			</table>

		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade" id="modalAdd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document" style="max-width:1500px;">
			<div class="modal-content">
			<div class="modal-header">
					<div class="col-md-5">
						<h5 class="modal-title" id="modalAddLabel">
							<b>Offline Form</b> <br>
						</h5>
					</div>
					<div class="col-md-2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
			</div>
			<form id="submit-form" action="{{route('wh_offline.store')}}">
				<div class="modal-body" style="max-height: 650px;">
					<input type="hidden" name="id" id="id" value="">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="pelanggan">Pelanggan</label>
								<select class="form-control select2 input-order" name="pelanggan" id="pelanggan" data-action="{{url('admin/warehouse/offline/getCustomer')}}" data-validation="required">
									<option value="">-- Pilih Pelanggan --</option>
									<?php foreach($data_customer as $customer): ?>
										<option value="<?php echo $customer->id ?>"><?php echo $customer->pelanggan_code .' ('.$customer->nama_usaha.') '; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">

							<div class="form-group">
								<label for="category_name">Kategori*</label>
								<input type="text" class="form-control input-customer" id="category_name" name="category_name" placeholder="Enter category_name" data-validation="required" readonly>
							</div>

							<div class="form-group">
								<label for="category_bussines_name">Kategori Bisnis*</label>
								<input type="text" class="form-control input-customer" id="category_bussines_name" name="category_bussines_name" placeholder="Enter category_bussines_name" data-validation="required" readonly>
							</div>

							<div class="form-group">
								<label for="nama_usaha">Nama Usaha*</label>
								<input type="text" class="form-control input-customer" id="nama_usaha" name="nama_usaha" placeholder="Enter nama_usaha" data-validation="required" readonly>
							</div>

							<div class="form-group">
								<label for="nama_pj">Nama PJ*</label>
								<input type="text" class="form-control input-customer" id="nama_pj" name="nama_pj" placeholder="Enter nama_pj" data-validation="required" readonly>
							</div>

							<div class="form-group">
								<label for="jabatan_pj">Jabatan*</label>
								<input type="text" class="form-control input-customer" id="jabatan_pj" name="jabatan_pj" placeholder="Enter jabatan_pj" data-validation="required" readonly>
							</div>

							<div class="form-group">
								<label for="phone_number">No Tlp*</label>
								<input type="text" class="form-control input-customer" id="phone_number" name="phone_number" placeholder="Enter phone_number" data-validation="required" readonly>
							</div>

							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea class="form-control input-customer" id="alamat" name="alamat" placeholder="Enter alamat" cols="30" rows="3" readonly></textarea>
							</div>

						</div>
						<div class="col-md-4">

							<div class="form-group">
								<label for="gudang">Gudang*</label>
								<select class="form-control select2 input-order" name="gudang" id="gudang" data-validation="required">
									<option value="">-- Pilih Gudang --</option>
									<?php foreach($data_lokasi_gudang as $lokasi_gudang): ?>
										<option value="<?php echo $lokasi_gudang->kabupaten_kota_id ?>"><?php echo $lokasi_gudang->kabupaten_kota_name?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="jenis_kemasan">Jenis Kemasan*</label>
								<select class="form-control select2 input-order" name="jenis_kemasan" id="jenis_kemasan" data-validation="required">
									<option value="">-- Pilih Jenis Kemasan --</option>
									<?php foreach($data_jenis_kemasan as $jenis_kemasan): ?>
										<option value="<?php echo $jenis_kemasan->id ?>"><?php echo $jenis_kemasan->title?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="jenis_uco">Jenis UCO*</label>
								<select class="form-control select2 input-order" name="jenis_uco" id="jenis_uco" data-validation="required">
									<option value="">-- Pilih Jenis UCO --</option>
									<option value="P">Padat</option>
									<option value="C">Cair</option>
								</select>
							</div>

							<div class="form-group">
								<label for="total_kemasan">Total Kemasan*</label>
								<input type="number" class="form-control input-order" id="total_kemasan" name="total_kemasan" placeholder="Enter total_kemasan" data-validation="required">
							</div>
							

						</div>
						<div class="col-md-4">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="quantity_kg">Quantity Kg*</label>
										<input type="number" step="0.01" class="form-control input-order qty_kg" id="quantity_kg" name="quantity_kg" placeholder="Enter quantity_kg" data-validation="required">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="quantity_l">Quantity L*</label>
										<input type="number" class="form-control input-order qty_l" id="quantity_l" name="quantity_l" placeholder="Enter quantity_l" data-validation="required" readonly>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="harga_satuan">Harga Satuan*</label>
								<input type="number" class="form-control input-order" id="harga_satuan" name="harga_satuan" placeholder="Enter harga_satuan" data-validation="required">
							</div>

							<div class="form-group">
								<label for="keterangan">Keterangan Order*</label>
								<textarea class="form-control" id="keterangan" name="keterangan" placeholder="Enter keterangan" data-validation="required" cols="30" rows="3"></textarea>
							</div>

						</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-customer btn-secondary" data-dismiss="modal">Cancel</button>
					<!-- <button type="button" class="btn btn-customer btn-info btn-startcall" data-action="{{route('cro_customer.startcall')}}">Call</button> -->
					<button type="submit" class="btn btn-customer btn-primary">Submit</button>
				</div>
			</form>
			</div>
		</div>
	</div>
@endsection

@push('body-scripts')
	<script>
		var table = $("#table-all").DataTable({
			"serverSide": "true",
			"processing": "true",
			"ordering": false,
			"searching": true,
			"scrollCollapse": true,
			"scrollY": "500px",
			"scrollX": true,
			"ajax": {
				"url": "{{ route('wh_offline.getAll') }}",
				"type": "GET",
				"datatype": "JSON",
				// "data": function data(d) {
				//     d.filter = $('input[name=filter_json]').val();
				//     d.start_from = $('input[name=start_from]').val();
				//     d.start_to = $('input[name=start_to]').val();
				// }
			},
			"columns": [
				{ data: "DT_RowIndex", name: "DT_RowIndex", className:'tail-left clickable-order', fixedColumns:true},
				{ data: "date_place", name: "date_place", className:"clickable-order"},
				{ data: "id_pelanggan", name: "id_pelanggan", className:"clickable-order"},
				{ data: "category_name", name: "category_name", className:"clickable-order"},
				{ data: "status_code", name: "status_code", className:"clickable-order"},
				{ data: "nama_usaha", name: "nama_usaha", className:"clickable-order"},
				{ data: "nama_pj", name: "nama_pj", className:"clickable-order"},
				{ data: "jabatan_pj", name: "jabatan_pj", className:"clickable-order"},
				{ data: "no_tlp", name: "no_tlp", className:"clickable-order"},
				{ data: "alamat", name: "alamat", className:"clickable-order"},
				{ data: "order_code", name: "order_code", className:"clickable-order"},
				{ data: "gudang_name", name: "gudang_name", className:"clickable-order"},
				{ data: "quantity_liter", name: "quantity_liter", className:"clickable-order"},
				{ data: "quantity_kg", name: "quantity_kg", className:"clickable-order"},
				{ data: "harga_satuan", name: "harga_satuan", className:"clickable-order"},
				{ data: "jenis_kemasan", name: "jenis_kemasan", className:"clickable-order"},
				{ data: "status_ket", name: "status_ket", className:"clickable-order"},
				{ data: "keterangan", name: "keterangan", className:"clickable-order"},
				// { data: "action", name: "action", className:"class-action tail-right"},
			],
		});

		function swalWarning(result){
			Swal.fire({
				title: 'Gagal',
				html: result.message,
				icon: "warning",
				allowOutsideClick: false
			});
		}
		function resetForm(params) {
			params[0].reset();
			$("#id").val('');
			$(".select2").val('').trigger('change');
			$(".select2-modal").val('').trigger('change');

			$("input").removeClass("is-invalid");
			$("input").removeClass("invalid-error");
			$("textarea").removeClass("is-invalid");
			$("textarea").removeClass("invalid-error");
			$("span").removeClass("is-invalid");
			$("span").removeClass("invalid-error");
			$("div").removeClass("is-invalid");
			$("div").removeClass("invalid-error");
			$(params).parent().find("span.invalid-feedback").remove();
			$('.edit-text').text('');
		}

		$(document).on('change', '#pelanggan', function() {
			var id = $(this).val();
			if(id != ''){
				var url = $(this).data('action')+'/'+id;
				$.ajax({
					url: url,
					type: "GET",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
								var check_arr = Array.isArray(val);
								
								if(check_arr){
									$.each(val, function (k, v) {
										var ele = $('#'+key+'_'+v);
										var check_ele = ele.length;
										if(check_ele > 0){
											var type_ele = ele.attr('type');
											if(type_ele == 'checkbox'){
												ele.prop('checked', true);
											}
										}    
									});
								} else {
									var ele = $('#'+key);
									var check_ele = ele.length;
									if(check_ele > 0){
										var check_text = ele.hasClass( "edit-text" );
										if(check_text){
											ele.text(val);
										} else {
											var check_select2 = ele.hasClass( "select2" );
											if(check_select2){
												ele.val(val).trigger('change');
											} else {
												ele.val(val);
											}
										}
									}    
								}
							});
							// $('#modalAdd').modal('show');
							Swal.close();
						} else {
							resetForm($('#submit-form'));
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
			} else {
				$('.input-customer').val('');
			}
		});
	
	</script>
@endpush