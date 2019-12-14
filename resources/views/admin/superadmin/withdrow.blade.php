@extends('layouts.backend')
@section('title','Withdrow Page')

@section('css')

@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<button class="btn btn-primary btn-sm pull-right" id="addWithdraw"> <i class="fa fa-plus"></i>Withdraw</button>
	</div>
	<div class="card-body">
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


<div class="modal fade" id="ViewWithdrawModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
            	<h4>Withdrawal Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove"></span></button>
			</div>
            <div class="modal-body">
            	<h3 class="text-center username">Mehedi Hasan</h3>
				<p class="text-center mt-0 withdraw_date">14 November 2019</p>
				<div class="row">
					<div class="col-sm-6 row">
						<label class="col-sm-8">Net Amount:</label>
						<label for="" class="col-sm-4 net_amount"></label>
					</div>
					<div class="col-sm-6 row">
						<label class="col-sm-4">Charge:</label>
						<label for="" class="col-sm-8 charge"></label>
					</div>
				</div>
				
				<div class="row pt-3">
					<div class="col-sm-6 row">
						<label class="col-sm-8">Total Vat:</label>
						<label for="" class="col-sm-4 vat"></label>
					</div>
					<div class="col-sm-6 row">
						<label class="col-sm-8">Total Amount:</label>
						<label for="" class="col-sm-4 total_amount"></label>
					</div>
				</div>
				
				<div class="row pt-3">
					<div class="col-sm-6 row">
						<label class="col-sm-8">Method:</label>
						<label for="" class="col-sm-4 payment_method"></label>
					</div>
					<div class="col-sm-6 row">
						<label class="col-sm-4">Status:</label>
						<div class="col-sm-8">
							<select class="withdrawal_status form-control form-control-sm">
								<option value="paid">Paid</option>
								<option value="hold">Hold</option>
								<option value="pending">Pending</option>
								<option value="cancel">Cancel</option>
							</select>
							<input type="hidden" name="withdrawal_id" class="withdrawal_id">
						</div>
					</div>
				</div>
				
				<div class="row pt-3">
					<div class="col-sm-12">
						<label class="control-label">Details:</label>
						<textarea name="withdrawal_details" class="withdrawal_details form-control" ></textarea>
					</div>
				</div>
				
				<div class="row pt-3">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<button class="btn btn-primary btn-sm btn-block"><i class="fa fa-print"></i> Print Receipt</button>
					</div>
				</div>
				
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
			ajax: '{{route('admin.superadmin.withdraw.data') }}',
			columns:[
			{title :  'SL.',   data:'id'},
			{title :  'Username',   data:'username'},
			{title : 'Method', data: 'payment_method'},
			{title : 'Amount', data: 'withdrawal_amount'},
			{title : 'Details',data: 'withdrawal_details'},
			{title : 'Created At', data: 'created_at'},
			{title : 'Charge', data: 'withdrawal_charge'},
			{title : 'Net Amount', data: 'total_withdrawal_amount'},
			{title : 'Status', data: 'withdrawal_status'},
			{title : 'Action', data: 'action'},
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
		
		$(document).on('click','.ViewWithdraw',function(){
			let Id = $(this).data('id');
			$.ajax({
				type: 'get',
				url: '{{ Route('admin.superadmin.single.withdraw') }}',
				data:{
					id:Id
				},
				success: function(data){
					$('.username').html(data.user_id);
					$('.withdrawal_id').val(data.id);
					let date = new Date((data.created_at));
					date = date.getFullYear() + '-'+(date.getMonth() + 1) + '-' + date.getDate();
					$('.withdraw_date').html(date);
					$('.net_amount').html(data.withdrawal_amount);
					$('.charge').html(data.withdrawal_charge);
					
					$('.vat').html(data.vat_amount);
					$('.total_amount').html(data.total_withdrawal_amount);
					
					$('.payment_method').html(data.payment_method);
					$('.withdrawal_status').val(data.withdrawal_status);
					$('.withdrawal_details').val(data.withdrawal_details);
					
					console.log(data);
					$("#ViewWithdrawModal").modal('toggle');
				}
			});
		});
		
		$(document).on('change','.withdrawal_status',function(){
			let st = $(this).val();
			let Id = $(".withdrawal_id").val();
			let details = $(".withdrawal_details").val();
			$.ajax({
				type: 'post',
				url: '{{ Route('admin.superadmin.single.withdraw.change_status') }}',
				data:{
					id:Id,
					status: st,
					withdrawal_details:details
				},
				success: function(data){
					
				}
			});
		});
		
	});
	
	
	
</script>

@endsection									