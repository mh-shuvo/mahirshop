@extends('layouts.backend')
@section('title','Withdrow Page')

@section('css')

@endsection

@section('content')
<div class="block">
	<div class="block-header">
		<button class="btn btn-primary btn-sm pull-right" id="addWithdraw"> <i class="fa fa-plus"></i>Withdraw</button>
	</div>
	<div class="block-content">
		<div class="dt-responsive table-responsive">
			<table id="WithdrawTable" class="table table-striped table-bordered nowrap text-center"></table>
		</div>
	</div>
</div>

<div class="modal fade" id="WithdrawModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
            	<h4>Withdrawal From</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove"></span></button>
			</div>
            <div class="modal-body">
            	<form id="withdrawForm" action="{{route('admin.withdraw.submit')}}" method="post">
	                <div class="form-group">
						<label class="control-label">Withdraw To:</label>
	                	<select class="form-control" name="withdraw_method" id="withdraw_method">
	                		<option value="">Select Withdrawal To</option>
	                		<option value="topup">Topup</option>
	                		<option value="cash">Payment</option>
						</select>
					</div>
					<div class="withdraw_method_section hide">
						<div class="form-group">
							<label class="control-label">Withdrawal Method:</label>
							<select class="form-control" name="payment_method" id="payment_method">
								<option value="office">Cash</option>
								<option value="bkash">Bkash</option>
								<option value="bank">Bank</option>
								<option value="nagat">Nagat</option>
							</select>
						</div>
						<div class="form-group account_number_section hide">
							<label class="control-label">Account Number:</label>
							<input class="form-control" name="account_number"></input>
						</div>
						<div class="form-group account_number_section hide">
							<label class="control-label">Account Details:</label>
							<textarea name="account_details" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Withdraw Amount:</label>
	                	<input type="text"class="form-control" name="withdraw_amount">
						
					</div>
					<div class="form-group">
						<label class="control-label">Withdraw Details:</label>
	                	<textarea name="withdraw_details" class="form-control"></textarea>
					</div>
					<div class="form-group">
	                	<label class="control-label">Transaction Pin:</label>
	                	<input type="password" class="form-control" name="txn_pin" placeholder="Transaction Pin" autocomplete="off">
					</div>
	                <div class="form-group">
	                	<button type=" submit" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-sm pull-right">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')

<script type="text/javascript">
	$(document).ready(function() {
		$('#WithdrawTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('admin.withdraw.data') }}',
			columns:[
			{title :  'SL.',   data:'id'},
			{title : 'Method', data: 'payment_method'},
			{title : 'Amount', data: 'withdrawal_amount'},
			{title : 'Details',data: 'withdrawal_details'},
			{title : 'Created At', data: 'created_at'},
		{title : 'Charge', data: 'withdrawal_charge'},
		{title : 'Net Amount', data: 'total_withdrawal_amount'},
		{title : 'Status', data: 'withdrawal_status'},
		]
		});
		
		$('#withdrawForm').ajaxForm({
		error: formError,
		success: function (responseText, statusText, xhr, $form) {
		formSuccess(responseText, statusText, xhr, $form);
		$('#WithdrawTable').DataTable().draw(true);
		},
		resetForm:true
		});
		
		$(document).on("click",'#addWithdraw',function(){
		$("#WithdrawModal").modal('toggle');
		});
		
		$(document).on('change','#payment_method',function(){
		let method = $(this).val();
		
		$(".account_number_section").addClass('hide');
		if(method != 'office'){
		$(".account_number_section").removeClass('hide');
		}
		});
		
		$(document).on('change','#withdraw_method',function(){
		let method = $(this).val();
		
		$(".withdraw_method_section").addClass('hide');
		if(method == 'cash'){
		$(".withdraw_method_section").removeClass('hide');
		}
		});
		});
		
		
		
		</script>
		
		@endsection					