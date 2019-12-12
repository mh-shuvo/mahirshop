@extends('layouts.backend')
@section('title','Transfered Report')

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
		<div class="block-content">
			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped">
					
					<thead>
						<tr>
							<th scope="col">Serial</th>
							<th scope="col">Transfer User ID </th>
							<th scope="col">Transfer User Name</th>
							<!--<th scope="col">Amount</th>-->
							<th scope="col">Trn Count</th>
							<th scope="col">Recieve User ID</th>
							<th scope="col">Recieve User Name</th>
							<th scope="col">Total Transfer</th>
							<th scope="col">Total Transfer Bonus</th>
							<th scope="col">Active Date</th>
							<th scope="col">Curent Status</th>
							<th scope="col">Curent Balance </th>
						</tr>
					</thead>
					
				</table>
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

});
</script>
@endsection