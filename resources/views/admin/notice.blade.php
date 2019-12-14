@extends('layouts.backend')
@section('title','Notice')

@section('css')

@endsection

@section('content')
	<div class="card">
	    <div class="card-header">
	        <h5>Notice</h5>
	        <button class="btn btn-sm btn-primary float-right mb-4" data-toggle="modal" data-target="#NoticeModal">Add New Notice</button>
	    </div>
	    <div class="card-body">
	        <div class="dt-responsive table-responsive">
	            <table id="base-style" class="table table-striped table-bordered nowrap text-center">
	                <thead>
	                    <tr>
	                        <th>Serial</th>
	                        <th>Title</th>
	                        <th>Description</th>
	                        <th>Status</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@for($i=1; $i<=5; $i++)
	                	<tr>
	                	    <td>{{$i}}</td>
	                	    <td>product title{{$i}}</td>
	                	    <td>
	                	    	<img class="img-80 img-radius" src="{{asset('public/backend/assets/images/avatar-1.jpg')}}" alt="">
	                	    	Lorem ipsum dolor sit amet, elit. Perferendis!
	                		</td>
	                	    <td>
							@if($i%2==0)
								<label class="label label-lg label-success">Notice</label>
							@else
								<label class="label label-lg label-info">Popup Notice</label>
							@endif
	                	    </td>
	                	    <td>
	                	    	<div class="dropdown-info dropdown open">
	                	    	    <button class="btn btn-sm btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
	                	    	    <div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
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
	                        <th>Title</th>
	                        <th>Description</th>
	                        <th>Status</th>
	                        <th>Action</th>
	                    </tr>
	                </tfoot>
	            </table>
	        </div>
	    </div>
	</div>

	<!-- Notice Modal -->
	<div class="modal fade" id="NoticeModal" tabindex="-1" role="dialog">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title"> Announcements Setting</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                <!-- Nav tabs -->
	                <ul class="nav nav-tabs md-tabs nav-justified" role="tablist">
	                    <li class="nav-item waves-effect waves-dark">
	                        <a class="nav-link active" data-toggle="tab" href="#Notice" role="tab">
	                            <h6 class="m-b-0">Notice</h6>
	                        </a>
	                        <div class="slide"></div>
	                    </li>
	                    <li class="nav-item waves-effect waves-dark">
	                        <a class="nav-link" data-toggle="tab" href="#popupNotice" role="tab">
	                            <h6 class="m-b-0">Popup Notice</h6>
	                        </a>
	                        <div class="slide"></div>
	                    </li>
	                </ul>
	                <!-- Tab panes -->
	                <div class="tab-content p-t-30">
	                    <div class="tab-pane active" id="Notice" role="tabpanel">
	                        <form class="md-float-material">
	                            <div class="form-group form-primary">
	                                <label class="float-label">Title</label>
	                                <input type="text" name="fontType" class="form-control form-control-sm" id="fontType" placeholder="Enter Font-Type" required="">
	                                <span class="form-bar"></span>
	                            </div>
	                            <div class="form-group form-primary">
	                                <label class="float-label">Font Size</label>
	                                <input type="text" name="fontSize" id="fontSize" class="form-control form-control-sm" placeholder="Enter Font Size" required="">
	                                <span class="form-bar"></span>
	                            </div>
	                            <div class="form-group form-primary">
	                                <label class="float-label">Font Color</label>
	                                <input type="color" name="fontColor" id="fontColor" class="form-control form-control-sm" required="">
	                                <span class="form-bar"></span>
	                            </div>
	                            <div class="form-group form-primary">
	                                <label class="float-label">Message</label>
	                                <textarea class="form-control form-control-sm" name="fontMassage" id="fontMassage" cols="30" rows="3" placeholder="Enter Descriptions"></textarea>
	                                <span class="form-bar"></span>
	                            </div>
	                            <div class="row m-t-30">
	                                <div class="col-md-12">
	                                    <button type="button" class="btn btn-primary btn-sm btn-block waves-effect text-center m-b-20" id="NoticeSave">Save</button>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                    <div class="tab-pane" id="popupNotice" role="tabpanel">
	                        <form class="md-float-material">
	                            <div class="form-group form-primary">
	                                <label class="float-label">Title</label>
	                                <input type="text" name="popupTitle" id="popupTitle" class="form-control form-control-sm" placeholder="Enter Popup Title" required="">
	                                <span class="form-bar"></span>
	                            </div>
	                            <div class="form-group form-primary">
	                                <label class="float-label">Image</label>
	                                <input type="file" name="popupImage" id="popupImage" class="form-control form-control-sm">
	                                <span class="form-bar"></span>
	                            </div>
	                            <div class="form-group form-primary">
	                                <label class="float-label">Message</label>
	                                <textarea class="form-control form-control-sm" name="popupMassage" id="popupMassage" cols="30" rows="3" placeholder="Enter Descriptions"></textarea>
	                                <span class="form-bar"></span>
	                            </div>
	                            <div class="row m-t-30">
	                                <div class="col-md-12">
	                                    <button class="btn btn-primary btn-sm btn-block waves-effect text-center m-b-20" id="PopupSave">Save</button>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-sm btn-default waves-effect " data-dismiss="modal">Close</button>
	            </div>
	        </div>
	    </div>
	</div>
		
@endsection

@section('js')


@endsection