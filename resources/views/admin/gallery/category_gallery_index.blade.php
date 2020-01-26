@extends('layouts.backend')
@section('title','New Category Gallery')

@section('css')

@endsection

@section('content')
<div class="ibox">
	<div class="ibox-header">
			<div class="text-right">
			<button type="button" style="margin:10px 0px;" class="pull-right btn btn-sm btn-primary add_gallery"><i class="fa fa-plus"></i> Add New Category Gallery</button>
			</div>
	</div>
	<div class="ibox-content">
		<div class="table-responsive">
			<table id="GalleryTable" class="table table-bordered table-striped table-center"> </table>
		</div>
	</div>
</div>
<!-- Add Modal -->
<div class="modal fade" id="GalleryModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
	        <form id="GelleryForm" method="post" action="{{route('category.gallery.store')}}">
	        	@csrf
	        	<input type="hidden" name="gallery_id" id="gallery_id" class="gallery_id">
	            <div class="modal-header">
	                <h4 class="modal-title">Add New Gallery Category</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
					</button>
				</div>
	            <div class="modal-body">
	                
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Enter Gallery Category Name">
                            <span class="messages"></span>
						</div>
					</div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                        	<select class="form-control form-control-sm" name="status" id="status">
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
	                <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light" id="addGallery">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
	$(document).ready(function() {
		$('#GalleryTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('category.gallery.data') }}',
			columns: [
            { title:'Serial', data: 'id'},
            { title:'Name', data: 'name'},
            { title:'Status', data: 'status'},
            { title:'Action', data: 'action'},
			]
		});
		
		$('#GelleryForm').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('#GalleryModal').modal('hide');
				$('#GalleryTable').DataTable().draw(true);
			},
			resetForm:true
		});
	});
	
	$(document).on('click','.add_gallery',function(){
		$("#gallery_id").val('');
		$("#GalleryModal").modal("toggle");
	});
	
	$(document).on("click",".galleryEdit", function(){
		var id = $(this).attr('id');
		var name = $(this).attr('name');
		var status = $(this).attr('status');
		$('#GalleryModal').modal('show');
		$("#gallery_id").val(id);
		$("#name").val(name);
		$("#status").val(status);
	});
	
	$(document).on("click",".galleryDelete", function(){
		var Id = $(this).attr('id');
		
		$(this).ajaxSubmit({
			error: formError,
			data: { "id": Id },
			dataType: 'json',
			method: 'GET',
			url: "{{route('category.gallery.delete')}}",
			success: function (responseText) {
				$("#GalleryTable").DataTable().draw(true)
			}
		});
	});
	
</script>

@endsection