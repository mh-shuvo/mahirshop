@extends('layouts.backend')
@section('title','Brand')

@section('css')

@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Brand List</h3>
		<div class="card-options">
			<button type="button" class="btn btn-sm btn-outline-primary add_brand">Add Brand</button>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table id="BrandTable" class="table table-bordered table-striped table-vcenter"> </table>
		</div>
	</div>
</div>
<!-- Add Modal -->
<div class="modal fade" id="BrandModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
	        <form id="brandForm" method="post" action="{{route('admin.brand.store')}}">
	        	<input type="hidden" name="brand_id" id="brand_id" class="brand_id">
	            <div class="modal-header">
	                <h4 class="modal-title">Add New Brand</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
					</button>
				</div>
	            <div class="modal-body">
	                
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Brand</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control-sm" name="brandName" id="brandName" placeholder="Enter Brand Name">
                            <span class="messages"></span>
						</div>
					</div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Brand Sort</label>
                        <div class="col-sm-9">
                        	<input type="text" class="form-control form-control-sm" name="brandSort" id="brandSort" placeholder="Enter Brand Sort">
                            <span class="messages"></span>
						</div>
					</div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                        	<select class="form-control form-control-sm" name="brandStatus" id="brandStatus">
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
	                <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light" id="addBrand">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
	$(document).ready(function() {
		$('#BrandTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('admin.brand.data') }}',
			columns: [
            { title:'Serial', data: 'id'},
            { title:'Brand Name', data: 'brand_name'},
            // { title:'Brand Sort', data: 'brand_sort'},
            { title:'Status', data: 'brand_status'},
            { title:'Action', data: 'action'},
			]
		});
		
		
		
		$('#brandForm').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('#BrandModal').modal('hide');
				$('#BrandTable').DataTable().draw(true);
			},
			resetForm:true
		});
	});
	
	$(document).on('click','.add_brand',function(){
		$("#brand_id").val('');
		$("#BrandModal").modal("toggle");
	});
	
	$(document).on("click",".brandEdit", function(){
		var id = $(this).attr('id');
		var brand_name = $(this).attr('brand_name');
		var brand_sort = $(this).attr('brand_sort');
		var status = $(this).attr('status');
		$('#BrandModal').modal('show');
		$("#brand_id").val(id);
		$("#brandName").val(brand_name);
		$("#brandSort").val(brand_sort);
		$("#brandStatus").val(status);
	});
	
	$(document).on("click",".brandDelete", function(){
		var Id = $(this).attr('id');
		
		$(this).ajaxSubmit({
			error: formError,
			data: { "id": Id },
			dataType: 'json',
			method: 'GET',
			url: "{{route('admin.brand.delete')}}",
			success: function (responseText) {
				$("#BrandTable").DataTable().draw(true)
			}
		});
	});
	
</script>

@endsection