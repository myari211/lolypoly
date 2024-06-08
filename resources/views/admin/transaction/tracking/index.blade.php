@extends('layouts.admin.app', ['title' => 'tracking','parent' => 'Transaction'])

@section('title', 'Tracking')

@section('content')
	<section class="content">
		<div id="main-content">
			<div id="content-header">
				<!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdd"><i class="fa-solid fa-circle-plus"></i> Add Transaction</button> -->
			</div>
			
			<table id="table-all" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>No</th>
						<th>Order ID</th>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>Shipping Method</th>
                        <th>Waybill</th>
                        <th>Packing At</th>
                        <th>Packing By</th>
                        <th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>

		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade" id="modal-process" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal-processLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modalAddLabel">Tracking</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="timeline-wrap">
				<ul class="timeline" id="tracking-shipping">
					<li>2016 - The present</li>
					<li>2015 - Last year</li>
					<li>2000 - New millenium</li>
					<li>1990 - Start of the 90's</li>
					<li>1900 - Something clever</li>
					<li>1800 - Something cleverer</li>
				</ul>
			</div>
		</div>
		</div>
		</div>
	</div>
	<form action="" id="submit-form">
		<input type="hidden" name="id" id="transaction_id">
	</form>
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
							"url": "{{ route('transaction.tracking.getAll') }}",
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
							{ data: "transaction_code", name: "transaction_code", className:"clickable-order"},
							{ data: "customer_name", name: "customer_name", className:"clickable-order"},
							{ data: "address_detail", name: "address_detail", className:"clickable-order"},
							{ data: "shipping_method", name: "shipping_method", className:"clickable-order"},
							{ data: "shipping_resi", name: "shipping_resi", className:"clickable-order"},
							{ data: "packing_at", name: "packing_at", className:"clickable-order"},
							{ data: "packing_by", name: "packing_by", className:"clickable-order"},
							{ data: "status_name", name: "status_name", className:"clickable-order"},
							{ data: "action", name: "action", className:"class-action tail-right"},
						]
					});
		
        $(document).on("click", ".btn-process", function (e) {
            e.preventDefault();
			var id = $(this).data("id");
			var url = $(this).data("url");
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
					// $("#modal-process").modal("show");
					if (result.code == 200) {
						var tbody = '';
						console.log(result.data);
						$.each(result.data, function (key, val) {
							tbody += '<li>'+val.date+' - '+val.msg+'</li>';
						});
						$("#tracking-shipping").html(tbody);
						$("#modal-process").modal("show");
						table.draw();
						Swal.close();
					} else {
                        Swal.fire({
                            title: "Gagal",
                            html: result.message,
                            icon: "warning",
                            allowOutsideClick: false,
                            confirmButtonColor: "#4395d1",
                        });
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

        $(document).on("click", ".btn-submit-done", function (e) {
            e.preventDefault();
			var url = $(this).data("action");
			console.log(url);
			var id = $(this).data("id");
			$("#transaction_id").val(id);
			$("#submit-form").attr("action", url);
			$("#submit-form").submit();

        });
		
	</script>
@endpush