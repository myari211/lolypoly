@extends('layouts.admin.app', ['title' => 'Peminjaman Kemasan','parent' => 'Warehouse'])

@section('title', 'Peminjaman Kemasan')

@section('content')
	<section class="content">
		<div id="main-content">
			<div id="content-header">
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa-solid fa-circle-plus"></i> Purchase Order</button>
			</div>
			<table id="table-all" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Order Code</th>
						<th>Lokasi Gudang</th>
						<th>Jenis Kemasan</th>
						<th>Total Kemasan</th>
						<th>Created By</th>
						<th>Created At</th>
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
			<h5 class="modal-title" id="modalAddLabel">Purchase Order</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{route('wh_purchase.store')}}" id="submit-form">
			<div class="modal-body" style="max-height: 650px;">
					<input type="hidden" name="id" id="id" value="">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="gudang">Lokasi gudang*</label>
										<select class="form-control select2" name="gudang" id="gudang" data-validation="required">
											<option value="">-- Pilih Lokasi Gudang --</option>
											@foreach($data_lokasi_gudang as $lokasi_gudang)
												<option value="{{$lokasi_gudang->kabupaten_kota_id}}">{{$lokasi_gudang->kabupaten_kota_name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="jenis_kemasan">Jenis Kemasan*</label>
										<select class="form-control select2" name="jenis_kemasan" id="jenis_kemasan" data-validation="required">
											<option value="">-- Pilih Jenis Kemasan --</option>
											@foreach($data_jenis_kemasan as $jenis_kemasan)
												<option value="{{$jenis_kemasan->id}}">{{$jenis_kemasan->title}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="total_kemasan">Total Kemasan*</label>
										<input type="number" step="0.01" class="form-control" id="total_kemasan" name="total_kemasan" placeholder="Enter total_kemasan" data-validation="required" >
									</div>
								</div>
								<div class="col-md-12">
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
				"url": "{{ route('wh_purchase.getAll') }}",
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
				{ data: "order_code", name: "order_code", className:"clickable-order"},
				{ data: "gudang_name", name: "gudang_name", className:"clickable-order"},
				{ data: "jenis_kemasan", name: "jenis_kemasan", className:"clickable-order"},
				{ data: "total_kemasan", name: "total_kemasan", className:"clickable-order"},
				{ data: "created_by", name: "created_by", className:"clickable-order"},
				{ data: "created_at", name: "created_at", className:"clickable-order"},
				{ data: "action", name: "action", className:"class-action tail-right"},
			]
		});
	
	</script>
@endpush