@extends('layouts.backend')
@section('title','Achiever Royalty Income Report')
@section('css')

@endsection
@section('content')
<div class="block">
	<div class="block-content">
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label class="control-label">Select Type</label>		
					<select class="form-control" name="type">
						<option value="">Select Income Type</option>
						<option value="achiever">Achiever</option>
						<option value="chairman_club">Chairman Club</option>
						<option value="nsm_royalty">NSM Royalty</option>
						<option value="ed_royalty">ED Royalty</option>
						<option value="stockist_royalty">Stokist Royalty</option>
						<option value="matching">Matching</option>
						<option value="mega_matching">Mega matching</option>
						<option value="sponsor">Sponsor</option>
						<option value="stockist_sponsor">Stockist Sponsor</option>
						<option value="stockist">Stockist</option>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Select Date</label>
					<div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
						<i class="fa fa-calendar"></i>&nbsp;
						<span></span> <i class="fa fa-caret-down"></i>
					</div>			
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Select User</label>
					<select class="form-control" name="select_user">
						<option value="">Select user</option>
						@foreach($users as $user)
						<option value="{{$user->id}}">{{$user->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			
		</div>
	</div>
	<div class="block-content">
		<div class="row">
			<div class="col-sm-12">
				<table id="ReportTable" class="table table-striped table-bordered text-center"></table>
			</div>
		</div>
		
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	$(function() {
		
		var start = moment().subtract(29, 'days');
		var end = moment();
		
		function cb(start, end) {
			$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}
		
		$('#reportrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, cb);
		
		cb(start, end);
		
		let User = $('input[name="username"]').val();
		let Type = $('select[name="type"]').val();
		
		$('#ReportTable').DataTable({
			processing: true,
			serverSide: true,
			ajax:{ 
				url:'{{route('admin.superadmin.report.data') }}',
				data:{type:$('select[name="type"]').val(),user:$('input[name="username"]').val()}
			},
			columns: [
			{ title:'ID', data: 'id' },
			{ title:'Username', data: 'username' },
			{ title:'From User', data: 'from_user' },
			{ title:'Amount', data: 'amount'},
			{ title:'Details', data: 'details'},
			{ title:'Status', 
				orderable:false,
				render:function(data,type,row){
					let st = row.status;
					if(st!=null){
						return st.charAt(0).toUpperCase() + st.slice(1);
					}
					return st;
				}
			},
			{ title:'Created At', data: 'created_at'},
			]
		});
		
		$(document).on("change keyup",'input[name="username"]',function(){
			usernameCheck($(this),'.user_check_status');
		});
		
		$(document).on('click','.submitBtn',function(){
			$('#ReportTable').DataTable().draw(true);
		});
		
	});
	
</script>
@endsection