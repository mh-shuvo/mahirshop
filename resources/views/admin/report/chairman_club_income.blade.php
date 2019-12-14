@extends('layouts.backend')
@section('title','Chairman Club Income Report')
@section('css')

@endsection
@section('content')
<div class="card">
	<div class="card-body">
		<table id="chairmanClubIncomeTable" class="table table-striped table-bordered text-center"></table>
	</div>
</div>
@endsection

@section('js')
<script>
		$(function() {
			$('#chairmanClubIncomeTable').DataTable({
				processing: true,
				serverSide: true,
				ajax:{ 
					url:'{{route('admin.report.data') }}',
					data:{type:'chairman_club'}
				 },
				columns: [
	            { title:'ID', data: 'id' },
	            { title:'Amount', data: 'amount'},
	            { title:'Details', data: 'details'},
	            { title:'Status', 
				 orderable:false,
				 render:function(data,type,row){
					 let st = row.status;
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