@extends('layouts.backend')
@section('title','Member Daily Earn')

@section('css')

@endsection

@section('content')
	<div class="block">
		<div class="block-content">
			<div class="card">
	    <div class="card-header">
	        <h5>Total Member In Sponsor,Generation,Matching Income</h5>
	    </div>
        <div class="card-block pb-0">
        	<form id="main" method="post" action="">
        		<div class="form-row">
    	    	    <div class="form-group col-sm-3">
    	    	    	<label class="col-form-label">Date</label>
    	    	        <div class="">
    	    	            <input type="date" class="form-control form-control-sm" name="Date" id="Date">
    	    	            <span class="messages"></span>
    	    	        </div>
    	    	    </div>
    	    	    <div class="col-sm-1"></div>
    	    	    <div class="form-group col-sm-3">
    	    	    	<label class="col-form-label">Select Income Type</label>
    	    	        <div class="">
    	    	            <select name="daily_earn" id="daily_earn" class="form-control form-control-sm">
    	    	                <option value="">Select Income Type</option>
    	    	                <option value="spot_income">Spot Income</option>
    	    	                <option value="generation_income">Generation Income</option>
    	    	                <option value="binary_income">Binary Income</option>
    	    	            </select>
    	    	            <span class="messages"></span>
    	    	        </div>
    	    	    </div>
    	    	</div>
        	</form>
        </div>
	    <div class="card-block">
	        <div class="dt-responsive table-responsive">
	            <table id="base-style" class="table table-striped table-bordered nowrap text-center">
	                <thead>
	                    <tr>
	                        <th>Serial</th>
	                        <th>User Id</th>
	                        <th>User Name</th>
	                        <th>Income</th>
	                        <th>Total Sponsor Income</th>
	                        <th>Total Generation Income</th>
	                        <th>Total Matching Income</th>
	                        <th>Active Date</th>
	                        <th>Current Status</th>
	                        <th>Date</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@for($i=1; $i<=5; $i++)
	                	<tr>
	                	    <td>{{$i}}</td>
	                	    <td>jbproducts{{$i}}</td>
	                	    <td>Jhon Deo</td>
	                	    <td>$220</td>
	                	    <td>$320,800</td>
	                	    <td>$320,800</td>
	                	    <td>$320,800</td>
	                	    <td>2011/04/25</td>
	                	    <td>
							@if($i%2==0)
								<label class="label label-lg label-success">Active</label>
							@else
								<label class="label label-lg label-danger">Inactive</label>
							@endif
	                	    </td>
	                	    <td>2011/04/25</td>
	                	</tr>
	                	@endfor
	                </tbody>
	                <tfoot>
	                    <tr>
	                        <th>Serial</th>
	                        <th>User Id</th>
	                        <th>User Name</th>
	                        <th>Income</th>
	                        <th>Total Sponsor Income</th>
	                        <th>Total Generation Income</th>
	                        <th>Total Matching Income</th>
	                        <th>Active Date</th>
	                        <th>Current Status</th>
	                        <th>Date</th>
	                    </tr>
	                </tfoot>
	            </table>
	        </div>
	    </div>
	</div>
		</div>
	</div>
@endsection

@section('js')


@endsection