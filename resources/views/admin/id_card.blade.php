@extends('layouts.backend')
@section('title','Id Card')

@section('css')

@endsection

@section('content')

<div class="block">
		<div class="block-content">
			<div class="dt-responsive table-responsive">
	            <table id="base-style" class="table table-striped table-bordered nowrap text-center">
	                <thead>
	                    <tr>
	                        <th>SN</th>
	                        <th>User Name</th>
	                        <th>User Mobile</th>
	                        <th>Status</th>
	                        <th>Blood</th>
	                        <th>Id Card Amount</th>
	                        <th>Printing Status</th>
	                    </tr>
	                </thead>
	                <tbody >
	                	@for($i=1; $i<=9; $i++)
	                	<tr>
	                	    <td>{{$i}}</td>
	                	    <td><a href="javascript:void(0)">jbproducts{{$i}}</a></td>
	                	    <td>0995522</td>
	                	    <td>Customer</td>
	                	    <td>O+</td>
	                	    <td>Paid</td>
	                	    @if($i%2==0)
	                	    <td><button type="button" class="btn btn-sm btn-danger">Pending</button></td>
	                	    @else
	                	    <td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#Print">Print Now</button></td>
	                	    @endif
	                	</tr>
	                	@endfor
	                </tbody>
	                <tfoot>
	                    <tr>
	                        <th>SN</th>
	                        <th>User Name</th>
	                        <th>User Mobile</th>
	                        <th>Status</th>
	                        <th>Blood</th>
	                        <th>Id Card Amount</th>
	                        <th>Printing Status</th>
	                    </tr>
	                </tfoot>
	            </table>
	        </div>
		</div>
	</div>
	
	<div class="modal fade modal-flex" id="Print" tabindex="-1" role="dialog">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	        	<div class="modal-header">
	        	    <h4 class="modal-title">ID Card</h4>
	        	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        	        <span aria-hidden="true">&times;</span>
	        	    </button>
	        	</div>
	            <div class="modal-body model-container">
	                <img src="{{asset('public/backend/assets/images/Modal/overflow.jpg')}}" alt="" class="img img-fluid" />
	                <h2></h2>
	                <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-sm text-center">
                                <tbody>
                                    <tr>
                                        <th><h4>Name</h4></th>
                                        <td><h4>JB Products</h4></td>
                                    </tr>
                                    <tr>
                                        <th>User ID</th>
                                        <td>Jacob</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile</th>
                                        <td>Larry</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>Larry</td>
                                    </tr>
                                    <tr>
                                        <th>Blood</th>
                                        <td>Larry</td>
                                    </tr>
                                    <tr>
                                        <th>Country</th>
                                        <td>Larry</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
	            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default waves-effect " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light ">Print Now</button>
                </div>
	        </div>
	    </div>
	</div>

@endsection

@section('js')


@endsection