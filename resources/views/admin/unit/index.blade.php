@extends('layouts.backend')
@section('title','Unit')

@section('css')

@endsection

@section('content')
	<div class="card">
		<div class="card-card">
		    <h3 class="card-title">Unit List</h3>
		    <div class="card-options text-right pr-2">
		        <button type="button" class="btn btn-sm btn-primary add_unit">Add Unit</button>
		    </div>
		</div>
		<div class="card-body">
			
			<div class="table-responsive">
			 <table id="UnitTable" class="table table-bordered table-striped table-vcenter"> </table>
			</div>
		</div>
	</div>
		<!-- Add Modal -->
	<div class="modal fade" id="UnitModal" tabindex="-1" role="dialog">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	        	<form id="UnitForm" method="post" action="{{route('admin.unit.store')}}">
	        		<input type="hidden" name="unit_id" id="unit_id">
		            <div class="modal-header">
		                <h4 class="modal-title">Add New Unit</h4>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
		                
	                    <div class="form-group row">
	                        <label class="col-sm-3 col-form-label">Unit</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control form-control-sm" name="unitName" id="unitName" placeholder="Enter Unit Name">
	                            <span class="messages"></span>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-sm-3 col-form-label">Sort</label>
	                        <div class="col-sm-9">
	                            <input type="text" class="form-control form-control-sm" name="unitSort" id="unitSort" placeholder="Enter Unit Sort">
	                            <span class="messages"></span>
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label class="col-sm-3 col-form-label">Status</label>
	                        <div class="col-sm-9">
	                        	<select class="form-control form-control-sm" name="unitStatus" id="unitStatus">
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
		                <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light" id="addUnit">Save</button>
		            </div>
	           </form> 
	        </div>
	    </div>
	</div>
@endsection

@section('js')
<script>
		$(document).on('click','.add_unit',function(){
			$('#unit_id').val("");
			$("#UnitModal").modal("toggle");
		});

		$(document).ready(function() {
			$('#UnitTable').DataTable({
				processing: true,
				serverSide: true,
				ajax: '{{ route('admin.unit.data') }}',
				columns: [
	            { title:'ID', data: 'id' },
	            { title:'Unit Name', data: 'unit_name'},
	            // { title:'Unit Sort', data: 'unit_sort'},
	            { title:'Unit Status', data: 'unit_status'},
	            { title:'Action', data: 'action'},
				]
			});
			
			$('#UnitForm').ajaxForm({
				error: formError,
				success: function (responseText, statusText, xhr, $form) {
					formSuccess(responseText, statusText, xhr, $form);
					$('#UnitModal').modal('hide');
					$('#UnitTable').DataTable().draw(true);
				},
				resetForm:true
			});
		});

		$(document).on('click','.unitEdit', function(){
			var id = $(this).attr('id');
			var unit_name = $(this).attr('unit_name');
			var unit_sort = $(this).attr('unit_sort');
			var unit_status = $(this).attr('unit_status');
			
			$('#unit_id').val(id);
			$('#unitName').val(unit_name);
			$('#unitSort').val(unit_sort);
			$('#unitStatus').val(unit_status);
			$('#UnitModal').modal('show');
		});

		$(document).on('click','.unitDelete', function (){
			var id = $(this).data('id');
			$(this).ajaxSubmit({
					error: formError,
					data: { "id": id },
					dataType: 'json',
					method: 'GET',
					url: "{{route('admin.unit.delete')}}",
					success: function (responseText) {
						$("#UnitTable").DataTable().draw(true)
					}
				});

		});
	</script>

@endsection