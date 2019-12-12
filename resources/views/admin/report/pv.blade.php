@extends('layouts.backend')
@section('title','PV Report')
@section('css')

@endsection
@section('content')
<div class="block">
	<div class="block-content">
		<table id="PVTable" class="table table-striped table-bordered text-center"></table>
	</div>
</div>
@endsection

@section('js')
<script>
	$(function() {
			$('#PVTable').DataTable({
				processing: true,
				serverSide: true,
				ajax:{ 
					url:'{{route('admin.report.pv.data') }}',
				 },
				columns: [
	            { title:'ID', data: 'id' },
	            { title:'Amount', data: 'point_amount'},
	            { title:'Details', data: 'point_details'},
	            { title:'Status', 
				 orderable:false,
				 render:function(data,type,row){
					 let st = row.point_status;
					 if(st!=null){
					 	return st.charAt(0).toUpperCase() + st.slice(1);
					 }
					 return st;
				 }
				},
	            { title:'Created At', data: 'created_at'},
				]
			});
		});

	</script>
@endsection