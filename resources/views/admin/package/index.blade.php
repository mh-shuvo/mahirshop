@extends('layouts.backend')
@section('title','Packages')

@section('css')

@endsection

@section('content')
	<div class="card">
	    <div class="card-header">
	        <h5>Package List</h5>
	        <button class="btn btn-sm btn-primary float-right mb-4" data-toggle="modal" data-target="#PackageModal">Add New Dealer</button>
	    </div>
	    <div class="card-body">
	        <div class="dt-responsive table-responsive">
	            <table id="PackageTable" class="table table-striped table-bordered nowrap text-center"></table>
	        </div>
	    </div>
	</div>

	<div class="modal fade" id="PackageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Package Create</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               <form id="PackageForm" method="post" action="{{route('add.package')}}" novalidate>
                <div class="modal-body">
                   <input type="hidden" name="id" id="package_id">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="title">Pack Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="title" id="title" placeholder="Enter Pack Title">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="package_value">Pack Value</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="package_value" id="package_value" placeholder="Enter Pack Value">
                                <span class="messages"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="package_details">Pack Details</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="package_details" id="package_details"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
	                        <label class="col-sm-3 col-form-label" for="is_default">Is Default</label>
	                        <div class="col-sm-9">
	                        	<select class="form-control form-control-sm" name="is_default" id="is_default">
	                        		<option value="">Select Pack</option>
	                        		<option value="True">True</option>
	                        		<option value="False">False</option>
	                        	</select>
	                            <span class="messages"></span>
	                        </div>
	                    </div>

                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="package_status">Pack Status</label>
                        <div class="col-sm-9">
                        	<select class="form-control form-control-sm" name="package_status" id="package_status">
                        		<option value="">Select Status</option>
                        		<option value="Active">Active</option>
                        		<option value="Inactive">Inactive</option>
                        	</select>
                            <span class="messages"></span>
                        </div>
                    </div>
                       
                        
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default waves-effect " data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light" id="addTopup">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
	$(function() {
		$('#PackageTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('list.package') }}',
			columns: [
            { title:'Pack Title', data: 'title'},
            { title:'Pack Value', data: 'package_value'},
            { title:'Pack Det', data: 'package_details'},
            { title:'Is Default', data: 'is_default'},
            { title:'Status', data: 'package_status'},
            { title:'Action', data: 'action'},
			]
		});
		
		$('#PackageForm').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('#PackageModal').modal('hide');
				$('#PackageTable').DataTable().draw(true);
			},
			resetForm:true
		});
	});

	$(document).on('click','.add_package',function(){
		$("#PackageModal").modal("toggle");
	});
	$(document).on('click','.packageEdit',function(){
		let id = $(this).attr('package_id');
		let title = $(this).attr('title');
		let package_value = $(this).attr('package_value');
		let package_details = $(this).attr('package_details');
		let is_default = $(this).attr('is_default');
		let package_status = $(this).attr('package_status');
		$("#package_id").val(id);
		$("#title").val(title);
		$("#package_value").val(package_value);
		$("#package_details").val(package_details);
		$("#is_default").val(is_default);
		$("#package_status").val(package_status);
		$("#PackageModal").modal("toggle");
	});
	$(document).on("click",".packageDelete", function(){
		var id = $(this).attr('package_id');
		$.ajax({
			type: 'get',
			url: '{{ url('admin/package/delete') }}/'+id ,
			success: function(data){
				$('#PackageTable').DataTable().draw(true);
			}
		});
	});
</script>

@endsection