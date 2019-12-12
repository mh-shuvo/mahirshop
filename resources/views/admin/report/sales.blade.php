@extends('layouts.backend')
@section('title','Sales')

@section('css')

@endsection

@section('content')
	<div class="block">
		<div class="block-content">
			<div class="row">
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
	
	 <!-- Hover table card start -->
				<div class="block-content">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped">
								<thead>
									<tr>
										<th colspan='10'>Name of all Criteria:</th>
										<th colspan='2'>৳</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td colspan='12' class="text-center"><h4>Others Report<h4></td>
									</tr>
									<tr>
										<td colspan='10'>Product Sales (Dealer TO Customer):</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Product Sales (Company To Dealer):</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Total HP Sales:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Total Income Transfer (Member):</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Total Topup Transfer (Member):</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Total Income Withdraw (Member):</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Total Dealer Income Withdraw:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Total Net Office Income Withdraw:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Total Income Withdraw:</td>
										<td colspan='2'>৳</td>
									</tr>
									
									<tr>
										<td colspan='12' class="text-center"><h4>Total In</h4></td>
									</tr>
									<tr>
										<td colspan='10'>Topup To Member:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Topup To Dealer:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>ID Charge:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Total Income</td>
										<td colspan='2'>৳</td>
									</tr>
									
									<tr>
										<td colspan='12' class="text-center"><h4>Total Cost</h4></td>
									</tr>
									<tr>
										<td colspan='10'>Sponsor Commission:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Binary Commission:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Mega Commission:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Rank Commission:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Dealer Commission:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Net Office Commission:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>TPC Commission:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Funds Reserved:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Total In Amount:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Total Out Amount:</td>
										<td colspan='2'>৳</td>
									</tr>
									<tr>
										<td colspan='10'>Profit Balance</td>
										<td colspan='2'>৳</td>
									</tr>
									
								</tbody>
							</table>
						</div>
				</div>
				<!-- Hover table card end -->
		
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

});
</script>

@endsection