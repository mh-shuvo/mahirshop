@extends('layouts.backend')
@section('title','Insentive Bonus Report')
@section('css')

@endsection
@section('content')
<div class="card">
	<div class="card-body">
		<table id="incentiveTable" class="table table-striped table-bordered"></table>
	</div>
</div>
@endsection

@section('js')
<script>
		$(function() {
			$('#incentiveTable').DataTable({
				processing: true,
				serverSide: true,
				ajax:{ 
					url:'{{route('admin.report.data') }}',
					data:{type:'incentive'}
				 },
				columns: [
	            { title:'ID', data: 'id' },
	            { title:'Amount', data: 'amount'},
	            { title:'Details', data: 'details'},
	            { title:'Status', data: 'status'},
	            { title:'Created At', data: 'created_at'},
	            { title:'Action', data: 'action'},
				]
			});
		});

	</script>
@endsection