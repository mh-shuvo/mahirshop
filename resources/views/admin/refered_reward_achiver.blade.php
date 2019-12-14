@extends('layouts.backend')
@section('title','Refered Reward Achiver')

@section('css')

@endsection

@section('content')
	<div class="card">
	    <div class="card-header">
	        <h5>Members</h5>
	    </div>
	    <div class="card-body">
	        <div class="dt-responsive table-responsive">
	            <table id="base-style" class="table table-striped table-bordered nowrap text-center">
	                <thead>
	                    <tr>
	                        <th>SN</th>
	                        <th>User Id</th>
	                        <th>Member Name</th>
	                        <th>Active Package</th>
	                        <th>Offer Term</th>
	                        <th>Active Date</th>
	                        <th>Status</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@for($i=1; $i<=9; $i++)
	                	<tr>
	                	    <td>{{$i}}</td>
	                	    <td>pro{{$i}}</td>
	                	    <td>Jhon Deo</td>
	                	    <td>2{{$i}}</td>
	                	    <td>--</td>
	                	    <td>2011/04/25</td>
	                        <td>
	                            <div class="dropdown-info dropdown open">
	                                <button class="btn btn-sm btn-success dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
	                                <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
	                                    <a class="dropdown-item waves-light waves-effect" href="#" data-toggle="modal" data-target="#Topup">Active</a>
	                                    <a class="dropdown-item waves-light waves-effect" href="#" data-toggle="modal" data-target="#Status">Inactive</a>
	                                </div>
	                            </div>
	                        </td>
	                	</tr>
	                	@endfor
	                </tbody>
	                <tfoot>
	                    <tr>
	                        <th>SN</th>
	                        <th>User Id</th>
	                        <th>Member Name</th>
	                        <th>Active Package</th>
	                        <th>Offer Term</th>
	                        <th>Active Date</th>
	                        <th>Status</th>
	                    </tr>
	                </tfoot>
	            </table>
	        </div>
	    </div>
	</div>
@endsection

@section('js')


@endsection