@extends('layouts.admin.app', ['title' => 'shipping','parent' => 'Transaction'])

@section('title', 'Shipping')

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
                        <th>Packing At</th>
                        <th>Packing By</th>
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
			<h5 class="modal-title" id="modalAddLabel">Shipping</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{route('transaction.shipping.store')}}" id="submit-form">
			<input type="hidden" name="id" id="id_process" val="">
			<div class="modal-body">
				<div class="row g-4">
					<div class="col-xl-8">
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
					
					<div class="col-xl-4">
						<div class="order-success">
							<div class="row g-4">
								<div id="shipping-address">
								</div>
							</div>
						</div>
					</div>
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
				"url": "{{ route('transaction.shipping.getAll') }}",
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
				{ data: "packing_at", name: "packing_at", className:"clickable-order"},
				{ data: "packing_by", name: "packing_by", className:"clickable-order"},
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
						tfoot += '<h5>'+formatRupiah(data_transaction.shipping_price)+'</h5>';
						tfoot += '</td>';
						tfoot += '</tr>';
						tfoot += '<tr class="table-order">';
						tfoot += '<td colspan="3">';
						tfoot += '<h5>Subtotal</h5>';
						tfoot += '</td>';
						tfoot += '<td>';
						tfoot += '<h5>'+formatRupiah(data_transaction.sub_total)+'</h5>';
						tfoot += '</td>';
						tfoot += '</tr>';
						tfoot += '<tr class="table-order">';
						tfoot += '<td colspan="3">';
						tfoot += '<h5>Discount (-)</h5>';
						tfoot += '</td>';
						tfoot += '<td>';
						tfoot += '<h5>'+formatRupiah(data_transaction.discount)+'</h5>';
						tfoot += '</td>';
						tfoot += '</tr>';
						tfoot += '<tr class="table-order">';
						tfoot += '<td colspan="3">';
						tfoot += '<h5 class="theme-color fw-bold">Total Price</h5>';
						tfoot += '</td>';
						tfoot += '<td>';
						tfoot += '<h5 class="theme-color fw-bold">'+formatRupiah(data_transaction.total)+'</h5>';
						tfoot += '</td>';
						tfoot += '</tr>';
						$("#foot-process").html(tfoot);

						shipping = '<h3>Shipping Address</h3>';
						shipping += '<h5>';
						shipping +=  result.data.address_detail;
						shipping += '</h5>';
						shipping += '<h3>Shipping Method</h3>';
						shipping += '<h4>';
						shipping +=  result.data.shipping_detail;
						shipping += '</h4>';
						$('#shipping-address').html(shipping);

						$('#id_process').val(data_transaction.id);
						$("#modal-process").modal("show");
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
	</script>
@endpush