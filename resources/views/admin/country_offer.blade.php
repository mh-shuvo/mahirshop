@extends('layouts.backend')
@section('title','Country Offer')

@section('css')

@endsection

@section('content')
	<div class="block">
		<div class="block-content">
			<div class="card">
	    <div class="card-header ">
	        <h5>Offer List</h5>
	        <button class="btn btn-sm btn-primary float-right waves-effect waves-light mb-4" data-toggle="modal" data-target="#CountryOffer">Add New Offer</button>
	    </div>
	    <div class="card-block">
	        <div class="dt-responsive table-responsive">
	            <table id="base-style" class="table table-striped table-bordered nowrap text-center">
	                <thead>
	                    <tr>
	                        <th>Serial</th>
	                        <th>Country Name</th>
	                        <th>Offer Calculation</th>
	                        <th>Offer Amount</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@for($i=1; $i<=5; $i++)
	                	<tr>
	                	    <td>{{$i}}</td>
	                	    <td>Bangladesh{{$i}}</td>
	                	    <td>
	                	    	@if($i%2==0)
	                	    		<label class="label label-lg label-danger">Minus</label>
	                	    	@else
	                	    		<label class="label label-lg label-success">Plus</label>
	                	    	@endif
	                	    </td>
	                	    <td>11{{$i}}</td>
	                        <td>
	                            <div class="dropdown-info dropdown open">
	                                <button class="btn btn-sm btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
	                                <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
	                                    <a class="dropdown-item waves-light waves-effect" href="#" id="View">View</a>
	                                    <a class="dropdown-item waves-light waves-effect" href="#" id="Edit">Edit</a>
	                                    <a class="dropdown-item waves-light waves-effect" href="#" id="Delete">Delete</a>
	                                </div>
	                            </div>
	                        </td>
	                	</tr>
	                	@endfor
	                </tbody>
	                <tfoot>
	                    <tr>
	                        <th>Serial</th>
	                        <th>Country Name</th>
	                        <th>Offer Calculation</th>
	                        <th>Offer Amount</th>
	                        <th>Action</th>
	                    </tr>
	                </tfoot>
	            </table>
	        </div>
	    </div>
	</div>

	<!-- Add Modal -->
	<div class="modal fade" id="CountryOffer" tabindex="-1" role="dialog">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Add New Country Offer</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                <form id="main" method="post" action="/" novalidate>
	                    <div class="form-group row">
	                        <label class="col-sm-3 col-form-label">Country Name</label>
	                        <div class="col-sm-9">
	                            <select class="form-control form-control-sm" name="countryName" id="countryName">
	                            	<option value="">Select Country</option>
	                            	<option value="bang">Bangladesh</option>
	                            	<option value="pak">Packistan</option>
	                            </select>
	                            <span class="messages"></span>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <label class="col-sm-3 col-form-label">Calculation</label>
	                        <div class="col-sm-9">
	                            <div class="form-check form-check-inline">
	                                <label class="form-check-label">
	                                    <input class="form-check-input" type="radio" name="Merchant" id="merchantSpo" value="option1"> Plus
	                                </label>
	                            </div>
	                            <div class="form-check form-check-inline">
	                                <label class="form-check-label">
	                                    <input class="form-check-input" type="radio" name="Merchant" id="Merchant" value="option2"> Minus
	                                </label>
	                            </div>
	                            <span class="messages"></span>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-sm-3 col-form-label">Offer Amount</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control form-control-sm" id="offerAmount" name="offerAmount" placeholder="Enter Offer Amount">
	                            <span class="messages"></span>
	                        </div>
	                    </div>
	                </form>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-sm btn-default waves-effect " data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" id="addOffer">Save</button>
	            </div>
	        </div>
	    </div>
	</div>
		</div>
	</div>
@endsection

@section('js')


@endsection