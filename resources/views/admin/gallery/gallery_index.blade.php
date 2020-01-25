@extends('layouts.backend')
@section('title','Gallery')

@section('css')
<style type="text/css">
	/*.hide{
		display: :none !important;
	}*/
</style>
@endsection

@section('content')
<div class="ibox">
	<div class="ibox-header">
		<h3 class="ibox">Gallery List</h3>
			<div class="text-right">
				<button type="button" style="margin:10px 0px;" class="pull-right btn btn-sm btn-primary add_gallery"><i class="fa fa-plus"></i> Add New Gallery</button>
			</div>
	</div>
	<div class="ibox-content">
		<div class="table-responsive">
			<table id="GalleryTable" class="table table-bordered table-striped table-vcenter"> </table>
		</div>
	</div>
</div>
<!-- Add Modal -->
<div class="modal fade" id="GalleryModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
	        <form id="GelleryForm" method="post" action="{{route('gallery.store')}}" enctype="multipart/form-data">
	        	
	        	<input type="hidden" name="gallery_id" id="gallery_id" class="gallery_id">
	            <div class="modal-header">
	                <h4 class="modal-title">Add New Gallery</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
					</button>
				</div>
	            <div class="modal-body">
	                
                   <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="title" id="title">
                            <span class="messages"></span>
						</div>
					</div>
					<div class="form-group row">
                        <label class="col-sm-3 col-form-label">Short Desc</label>
                        <div class="col-sm-9">
							
							<textarea class="form-control form-control-sm" id="desc" name="desc"></textarea>
							<span class="messages"></span>
						</div>
					</div>
					<div class="form-group row">
                        <label class="col-sm-3 col-form-label">Gallery Category</label>
                        <div class="col-sm-9">
                        	<select class="form-control form-control-sm" name="category" id="category">
                        		<option value="">Select Gallery Category</option>
                        		@if(!empty($gal_category))
						    		@foreach($gal_category as $category)
						    		<option value="{{ $category->id }}"
						    			
						    			>{{$category->name}}</option>
						    		@endforeach
						    		@endif
							</select>
                            <span class="messages"></span>
						</div>
					</div>

					<div class="form-group row">
                        <label class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-9">
                        	<select class="form-control form-control-sm" name="type" id="selectfile">
                        		<option value="image">Image</option>
                        		<option value="video">Video</option>
							</select>
                            <span class="messages"></span>
						</div>
					</div>
					<div class="form-group row">
                        <label class="col-sm-3 col-form-label">Image/Video Link</label>
                        <div class="col-sm-9">
							<input type="file" class="form-control form-control-sm" name="image" id="image">
							<img src="" id="image_preview" class="rounded float-left mt-3 hide" style="height: 100px; width:100px;">
                            <input type="text" class="form-control form-control-sm hide" name="video" placeholder="https://youtu.be/taGwC57aMzU" id="video">
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
			ajax: '{{ route('gallery.data') }}',
			columns: [
            { title:'Serial', data: 'id'},
            { title:'Title', data: 'title'},
            { title:'Description', data: 'desc'},
            { title:'Gallery Category Name', data: 'gal_cat_id'},
            { title:'Image',
            	orderable:false,
            	render: function(data,type,row){
					let html = '<img src="{{asset('public')}}/'+row.image+'" style="height:80px; width:100px;">';
					if(row.type=='video'){
						html = '<img src="'+row.image+'" style="height:80px; width:100px;">';
					}
            		 return html;
				}
			},
            { title:'Type', data: 'type'},
            { title:'Status', data: 'status'},
            { title:'Action', data: 'action'},
			]
		});
		
		$('#GelleryForm').ajaxForm({
			beforeSend: formBeforeSend,
			beforeSubmit: formBeforeSubmit,
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('#GalleryModal').modal('hide');
				$('#GalleryTable').DataTable().draw(true);
			},
			clearForm:true,
			resetForm:true
		});
	});
	
	$(document).on('click','.add_gallery',function(){
		$("#GelleryForm").trigger("reset");
		$("#desc").val("");
		$("#gallery_id").val("");
		$("#GalleryModal").modal("toggle");
		$("#image_preview").addClass('hide');
	});
	
	$(document).on("click",".galleryEdit", function(){
		var id = $(this).attr('id');
		var title = $(this).attr('title');
		var desc = $(this).attr('desc');
		var gal_cat_id = $(this).attr('gal_cat_id');
		var image = $(this).attr('image');
		var type = $(this).attr('type');
		var status = $(this).attr('status');
		$('#GalleryModal').modal('show');
		$("#gallery_id").val(id);
		$("#title").val(title);
		$("#desc").text(desc);
		$("#selectfile").val(type);
		$("#category").val(gal_cat_id);
		$("#status").val(status);

		if(type == 'image'){
			$("#image_preview").removeClass('hide');
			$("#image_preview").attr('src','{{asset("public")}}/'+image);
		}
		else{
			$("#video").removeClass('hide');
			$("#video").val(image);
		}
	});
	
	$(document).on("click",".galleryDelete", function(){
		var Id = $(this).attr('id');
		
		$(this).ajaxSubmit({
			error: formError,
			data: { "id": Id },
			dataType: 'json',
			method: 'GET',
			url: "{{route('gallery.delete')}}",
			success: function (responseText) {
				$("#GalleryTable").DataTable().draw(true)
			}
		});
	});
	$(document).on('change','#selectfile',function(){
		$("#video").addClass('hide');
		$("#image").removeClass('hide');
		$("#image_preview").removeClass('hide');
		
		if($(this).val() == 'video'){	
			$("#video").removeClass('hide');
			$("#image").addClass('hide');
			$("#image_preview").addClass('hide');
		}
	});
	function readURL(input, el) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$(el).attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#image").change(function() {
		$('#image_preview').addClass('d-none');
		readURL(this, '#image_preview');
		$('#image_preview').removeClass('d-none');
	});
</script>

@endsection