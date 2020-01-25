@extends('layouts.backend')
@section('title','Category')

@section('css')

@endsection

@section('content')
	<div class="card">
		<div class="card-header">
		    <h3 class="card-title">Category List</h3>
		    <div class="card-options text-right">
		        <button type="button" class="btn btn-sm btn-outline-primary add_category">Add Category</button>
		    </div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			 <table id="CategoryTable" class="table table-bordered table-striped table-vcenter"> </table>
			</div>
		</div>
	</div>
	<div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	        	<form id="CategoryForm" method="post" action="{{route('admin.category.store')}}" novalidate>
	        		<input type="hidden" name="categoryId" id="categoryId">
		            <div class="modal-header">
		                <h4 class="modal-title">Add New Category</h4>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
	                    <div class="form-group row">
	                        <label class="col-sm-3 col-form-label">Category</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control form-control-sm" name="categoryName" id="categoryName" placeholder="Enter Category Name">
	                            <span class="messages"></span>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-sm-3 col-form-label">Sort</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control form-control-sm" name="categorySort" id="categorySort" placeholder="Enter Category Sort">
	                            <span class="messages"></span>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-sm-3 col-form-label">Image</label>
	                        <div class="col-sm-9">
	                            <input type="file" class="form-control form-control-sm" name="categorylogo" id="categorylogo">
	                            <span class="messages"></span>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-sm-3 col-form-label">Feature</label>
	                        <div class="col-sm-9">
	                        	<select class="form-control form-control-sm" name="Featured" id="Featured">
	                        		<option value="">Select Feature</option>
	                        		<option value="True">Featured</option>
	                        		<option value="False">Uneatured</option>
	                        	</select>
	                            <span class="messages"></span>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-sm-3 col-form-label">Status</label>
	                        <div class="col-sm-9">
	                        	<select class="form-control form-control-sm" name="categoryStatus" id="categoryStatus">
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
		                <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light" id="addCategory">Save</button>
		            </div>
	           </form> 
	        </div>
	    </div>
	</div>
@endsection

@section('js')
	<script>
			$(function() {
				$('#CategoryTable').DataTable({
					processing: true,
					serverSide: true,
					ajax: '{{route('admin.category.data') }}',
					columns: [
		            { title:'Serial', data: 'id'},
		            { title:'Category Name', data: 'category_name'},
		            { title:'Category Image', 
		                orderable:false,
		                render:function(data,type,row){
		                    return '<img src="{{asset("public/")}}/'+row.image +'" style="height:40px; width:50px;">';
		                }
		            },
		            { title:'Category Feature', data: 'category_featured'},
		            { title:'Status', data: 'category_status'},
		            { title:'Action', data: 'action'},
					]
				});
				
				$('#CategoryForm').ajaxForm({
					error: formError,
					success: function (responseText, statusText, xhr, $form) {
						formSuccess(responseText, statusText, xhr, $form);
						$('#CategoryModal').modal('hide');
						$('#CategoryTable').DataTable().draw(true);
					},
					resetForm:true
				});
			});

			$(document).on('click','.add_category',function(){
				$('#categoryId').val('');
				$("#CategoryModal").modal("toggle");
			});

			$(document).on('click','.categoryEdit',function(){
				var id = $(this).attr('id');
				var category_name = $(this).attr('category_name');
				var category_sort = $(this).attr('category_sort');
				var category_featured = $(this).attr('category_featured');
				var category_status = $(this).attr('category_status');
				var image = $(this).attr('image');
				$('#CategoryModal').modal('show');
				$('#categoryId').val(id);
				$('#categoryName').val(category_name);
				$('#categorySort').val(category_sort);
				$('#Featured').val(category_featured);
				$('#categoryStatus').val(category_status);
				$('#categorylogo').val(image);
			});

			$(document).on("click",".categoryDelete", function(){
				var id = $(this).attr('id');
				$(this).ajaxSubmit({
					error: formError,
					data: { "id": id },
					dataType: 'json',
					method: 'GET',
					url: "{{route('admin.category.delete')}}",
					success: function (responseText) {
						$("#CategoryTable").DataTable().draw(true)
					}
				});
			});
	</script>

@endsection