@extends('layouts.backend')
@section('title','TopUp Transaction List')

@section('css')

@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<button class="btn btn-primary btn-sm pull-right" id="transfer_topup_model"> <i class="fa fa-plus"></i> Transfer TopUp</button>
	</div>
	<div class="card-body">
		<div class="dt-responsive table-responsive">
			<table id="TopupTable" class="table table-striped table-bordered nowrap text-center"></table>
		</div>
	</div>
</div>

<div class="modal fade" id="TopupTransferModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
            	<h4>Transfer TopUp Balance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove"></span></button>
			</div>
            <div class="modal-body">
            	<form id="transferForm" action="{{route('admin.topup.transfer')}}" method="post">
	                <div class="form-group">
						<label class="control-label">Transfer Username:</label>
	                	<input type="text" name="username" placeholder="Transfered Username" class="form-control" autocomplete="off">
						<span class="col-form-label username_check_status"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Transfer Amount:</label>
	                	<input type="text" name="transfer_amount" placeholder="Transfered Amount" class="form-control">
						<span id="user_name"></span>
					</div>
	                <div class="form-group">
	                	<button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-sm pull-right transferdCupon">Transfered</button>
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
		$('#TopupTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('admin.topup.data')}}',
			columns: [
			{ title:'Topup Amount', data: 'topup_amount'},
			{ title:'Topup Details', data: 'topup_details'},
			{ title:'TopUp Flow', data: 'topup_flow'},
			{ title:'Created Date', data: 'created_at'},
			{ title:'Topup Status', data: 'topup_status'},
			]
		});
		
		$('#transferForm').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('#TopupTable').DataTable().draw(true);
			},
			resetForm:true
		});
		
		$(document).on("click",'#transfer_topup_model',function(){
			$("#TopupTransferModal").modal('toggle');
		});
		
		$(document).on("change keyup",'input[name="username"]',function(){
			usernameCheck($(this),'.username_check_status');
		});
	});
	
	
	
</script>

@endsection