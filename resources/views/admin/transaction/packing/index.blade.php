@extends('layouts.admin.app', ['title' => 'packing','parent' => 'Transaction'])

@section('title', 'Packing')

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
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>

		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade" id="modal-process" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal-processLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modalAddLabel">Packing</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{route('transaction.packing.store')}}" id="submit-form">
			<input type="hidden" name="id" id="id_process" val="">
			<div class="modal-body">
				<div class="table-responsive table-details">
					<table class="table cart-table table-borderless">
						<thead>
							<tr>
								<th colspan="4">Items</th>
							</tr>
						</thead>
						<tbody id="body-process">
						</tbody>
						<tfoot id="foot-process" style="border-top: 1px solid #ccc;">
						</tfoot>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Process</button>
			</div>
		</form>
		</div>
		</div>
	</div>
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
				"url": "{{ route('transaction.packing.getAll') }}",
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
				{ data: "payment_method", name: "payment_method", className:"clickable-order"},
				{ data: "status_name", name: "status_name", className:"clickable-order"},
				{ data: "total", name: "total", className:"clickable-order"},
				{ data: "date", name: "date", className:"clickable-order"},
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
					if (result.code == 200) {
						var tbody = '';
						$.each(result.data.detail_product, function (key, val) {
							tbody += '<tr class="table-order">';
							tbody += '<td>';
							tbody += '<a href="javascript:void(0)">';
							tbody += '<img src="'+val.product_image+'" class="blur-up lazyload" style="height: 80px; width: 100px; border-radius: 5px;" alt="">';
							tbody += '</a>';
							tbody += '</td>';
							tbody += '<td>';
							tbody += '<p>Product Name</p>';
							tbody += '<h5>'+val.product_name+'</h5>';
							tbody += '</td>';
							tbody += '<td>';
							tbody += '<p>Quantity</p>';
							tbody += '<h5>'+val.stock+'</h5>';
							tbody += '</td>';
							tbody += '<td>';
							tbody += '<p>Price</p>';
							tbody += '<h5>'+val.product_price+'</h5>';
							tbody += '</td>';
							tbody += '</tr>';
						});
						$("#body-process").html(tbody);

						var data_transaction = result.data;
						tfoot = '<tr class="table-order">';
						tfoot += '<td colspan="3">';
						tfoot += '<h5>Shipping</h5>';
						tfoot += '</td>';
						tfoot += '<td>';
						tfoot += '<h4>'+formatRupiah(data_transaction.shipping_price)+'</h4>';
						tfoot += '</td>';
						tfoot += '</tr>';
						tfoot += '<tr class="table-order">';
						tfoot += '<td colspan="3">';
						tfoot += '<h5>Subtotal</h5>';
						tfoot += '</td>';
						tfoot += '<td>';
						tfoot += '<h4>'+formatRupiah(data_transaction.sub_total)+'</h4>';
						tfoot += '</td>';
						tfoot += '</tr>';
						tfoot += '<tr class="table-order">';
						tfoot += '<td colspan="3">';
						tfoot += '<h5>Discount (-)</h5>';
						tfoot += '</td>';
						tfoot += '<td>';
						tfoot += '<h4>'+formatRupiah(data_transaction.discount)+'</h4>';
						tfoot += '</td>';
						tfoot += '</tr>';
						tfoot += '<tr class="table-order">';
						tfoot += '<td colspan="3">';
						tfoot += '<h4 class="theme-color fw-bold">Total Price</h4>';
						tfoot += '</td>';
						tfoot += '<td>';
						tfoot += '<h4 class="theme-color fw-bold">'+formatRupiah(data_transaction.total)+'</h4>';
						tfoot += '</td>';
						tfoot += '</tr>';
						$("#foot-process").html(tfoot);

						$('#id_process').val(data_transaction.id);
						$("#modal-process").modal("show");
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
	</script>
@endpush