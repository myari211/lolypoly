@extends('layouts.admin.app', ['title' => 'List','parent' => 'Warehouse'])

@section('title', 'Warehouse List')

@section('content')
	<section class="content">
		<div id="main-content">
			<table id="table-all" class="table table-striped table-bordered table-responsive" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Gudang</th>
						<th>ID Pelanggan</th>
						<th>Order Id</th>
						<th>Kategori</th>
						<th>Nama Usaha</th>
						<th>Nama PJ</th>
						<th>Jabatan</th>
						<th>Quantity L</th>
						<th>Quantity Kg</th>
						<th>Real Quantity Kg</th>
						<th>Harga Satuan</th>
						<th>Kemasan</th>
						<th>Keterangan Detail</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>

		</div>
	</section>
	<!-- Modal -->
	<div class="modal fade" id="modalCall" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalCallLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
		<div class="modal-body text-center">
			<h3>Memulai Panggilan</h3>
			<h3 id="phone_number">0328432846328746</h3>
			<div class="lds-facebook"><div></div><div></div><div></div></div>
			<h3><span id="minutes">00</span>:<span id="seconds">00</span>:<span id="tens">00</span></h3>
			<button type="button" class="btn btn-primary endcall-button" id="endcall" data-url="" data-id="">End Call</button>
		</div>
		</div>
	</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalAdd" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document" style="max-width:1500px;">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modalAddLabel">Order <span id="order_id" class="edit-text" style="padding:0"></span></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{route('wh_list.store')}}" id="submit-form">
			<div class="modal-body" style="max-height: 650px;">
					<input type="hidden" name="id" id="id" value="">
					<div class="row">
						<div class="col-md-4">
							<table>
								<tr>
									<td>ID Pelanggan</td>
									<td>:</td>
									<td id="id_pelanggan" class="edit-text"></td>
								</tr>
								<tr>
									<td>Kategori Usaha</td>
									<td>:</td>
									<td id="category_bussines_name" class="edit-text"></td>
								</tr>
								<tr>
									<td>Nama Usaha</td>
									<td>:</td>
									<td id="nama_usaha" class="edit-text"></td>
								</tr>
								<tr>
									<td>Nama PJ</td>
									<td>:</td>
									<td id="nama_pj" class="edit-text"></td>
								</tr>
								<tr>
									<td>Jabatan PJ</td>
									<td>:</td>
									<td id="jabatan_pj" class="edit-text"></td>
								</tr>
								<tr>
									<td>No Tlp</td>
									<td>:</td>
									<td id="phone_number" class="edit-text"></td>
								</tr>
								<tr>
									<td>Alamat Detail</td>
									<td>:</td>
									<td id="alamat" class="edit-text" style="width:75%"></td>
								</tr>
								<tr>
									<td>Jenis UCO</td>
									<td>:</td>
									<td id="jenis_uco_name" class="edit-text" style="width:75%"></td>
								</tr>
								<tr>
									<td>Kategori Status</td>
									<td>:</td>
									<td id="status_category_name" class="edit-text" style="width:75%"></td>
								</tr>
								<tr>
									<td>Nama Salles</td>
									<td>:</td>
									<td id="salles_name" class="edit-text"></td>
								</tr>
								<tr>
									<td>Nama Driver</td>
									<td>:</td>
									<td id="driver_name" class="edit-text"></td>
								</tr>
								<tr>
									<td>Pickup Time</td>
									<td>:</td>
									<td id="pickup_time" class="edit-text"></td>
								</tr>
							</table>
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-3">
									<h4 style="font-weight:bold">BEFORE</h4>
									<table>
										<tr>
											<td>Jenis Kemasan</td>
											<td>:</td>
											<td id="jenis_kemasan_name" class="edit-text"></td>
										</tr>
										<tr>
											<td>Total Kemasan</td>
											<td>:</td>
											<td id="total_kemasan" class="edit-text"></td>
										</tr>
										<tr>
											<td>Quantity Kg</td>
											<td>:</td>
											<td id="quantity_kg" class="edit-text"></td>
										</tr>
										<tr>
											<td>Quantity Liter</td>
											<td>:</td>
											<td id="quantity_l" class="edit-text"></td>
										</tr>
									</table>
								</div>
								<div class="col-md-9">
									<h4 style="font-weight:bold">REAL QUANTITY</h4>
									<div class="row">
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="real_jenis_kemasan">Jenis Kemasan*</label>
														<select class="form-control select2" name="real_jenis_kemasan" id="real_jenis_kemasan" data-validation="required">
															<option value="">-- Pilih Jenis Kemasan --</option>
															@foreach($data_jenis_kemasan as $jenis_kemasan)
																<option value="{{$jenis_kemasan->id}}">{{$jenis_kemasan->title}}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="real_total_kemasan">Total Kemasan*</label>
														<input type="number" step="0.01" class="form-control" id="real_total_kemasan" name="real_total_kemasan" placeholder="Enter real_total_kemasan" data-validation="required" >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="real_quantity_kg">Quantity Kg*</label>
														<input type="number" step="0.01" class="form-control" id="real_quantity_kg" name="real_quantity_kg" placeholder="Enter real_quantity_kg" data-validation="required" >
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="real_quantity_l">Quantity Liter*</label>
														<input type="number" class="form-control" id="real_quantity_l" name="real_quantity_l" placeholder="Enter real_quantity_l" data-validation="required">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="status_kemasan">Status Kemasan*</label>
														<select class="form-control select2" name="status_kemasan" id="status_kemasan" data-validation="required">
															<option value="">-- Pilih Jenis Kemasan --</option>
															@foreach($data_status_kemasan as $status_kemasan)
																<option value="{{$status_kemasan->id}}">{{$status_kemasan->title}}</option>
															@endforeach
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="upload-photo-warehouse">
								<div class="box">
									<div class="js--image-preview js--no-default"></div>
									<div class="upload-options">
									<label>
										<input type="file" name="file_1" class="image-upload" accept="image/*" />
									</label>
									</div>
								</div>
								<div class="box">
									<div class="js--image-preview js--no-default"></div>
									<div class="upload-options">
									<label>
										<input type="file" name="file_2" class="image-upload" accept="image/*" />
									</label>
									</div>
								</div>
								<div class="box">
									<div class="js--image-preview js--no-default"></div>
									<div class="upload-options">
									<label>
										<input type="file" name="file_3" class="image-upload" accept="image/*" />
									</label>
									</div>
								</div>
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
		var table = $("#table-all").DataTable({
			"serverSide": "true",
			"processing": "true",
			"ordering": false,
			"searching": true,
			"autoWidth": true,
			"ajax": {
				"url": "{{ route('wh_list.getAll') }}",
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
				{ data: "gudang_name", name: "gudang_name", className:"clickable-order"},
				{ data: "id_pelanggan", name: "id_pelanggan", className:"clickable-order"},
				{ data: "order_code", name: "order_code", className:"clickable-order"},
				{ data: "category_name", name: "category_name", className:"clickable-order"},
				{ data: "nama_usaha", name: "nama_usaha", className:"clickable-order"},
				{ data: "nama_pj", name: "nama_pj", className:"clickable-order"},
				{ data: "jabatan_pj", name: "jabatan_pj", className:"clickable-order"},
				{ data: "quantity_liter", name: "quantity_liter", className:"clickable-order"},
				{ data: "quantity_kg", name: "quantity_kg", className:"clickable-order"},
				{ data: "real_quantity_kg", name: "real_quantity_kg", className:"clickable-order"},
				{ data: "harga_satuan", name: "harga_satuan", className:"clickable-order"},
				{ data: "jenis_kemasan", name: "jenis_kemasan", className:"clickable-order"},
				{ data: "keterangan", name: "keterangan", className:"clickable-order"},
				{ data: "action", name: "action", className:"class-action tail-right"},
			]
		});
	
	</script>
@endpush