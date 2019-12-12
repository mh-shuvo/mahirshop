@extends('layouts.backend')
@section('title','Stock Report')
@section('css')

@endsection
@section('content')
<div class="block">
	<div class="block-content">
		<table id="StockTable" class="table table-striped table-bordered"></table>
	</div>
</div>
@hasanyrole('admin|manager')
<div class="modal fade" id="AddStockModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Stock</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="false">&times;</span>
				</button>
			</div>
			<form id="AddStockForm" method="POST" action="{{route('admin.report.stock.add')}}">
				<div class="modal-body">
					<input type="hidden" class="form-control form-control-sm" name="product_id" id="product_id" placeholder="Enter User Id">
					<div class="form-group">
						<label class="col-form-label">Product Quantity</label>
						<input type="text" class="form-control form-control-sm" name="quantity" id="quantity" placeholder="Enter Product Quantity">	
					</div>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-default waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endhasanyrole
@endsection

@section('js')
<script>
	$(function() {
		$('#StockTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{route('admin.report.stock.data')}}",
			columns: [
			{ title:'Product Id', data: 'product_code' },
			{ title:'Product Name', data: 'product_name'},
			{ title:'Stock Status', data: 'stock'},
			@hasanyrole('admin|manager')
			{ title:'Action', data: 'action'},
			@endhasanyrole
			]
		});
		@hasanyrole('admin|manager')
		$(document).on('click','.addStock',function(){
			let Id = $(this).data('product_id');
			$("#product_id").val(Id);
			$("#AddStockModal").modal('toggle');
		})
		
		$("#AddStockForm").ajaxForm({
			error: formError,
			success: function(responseText, statusText,xhr,$form){
				formSuccess(responseText, statusText,xhr,$form);
				$("#StockTable").DataTable().draw(true)
			},
			resetForm: true
		});
		@endhasanyrole
	});
	
	
</script>
@endsection			