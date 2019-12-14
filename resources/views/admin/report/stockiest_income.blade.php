@extends('layouts.backend')
@section('title','Stockiest Income Report')
@section('css')

@endsection
@section('content')
<div class="card">
	<div class="card-body">
		<table id="stockiestIncomeTable" class="table table-striped table-bordered"></table>
	</div>
</div>
@endsection

@section('js')
<script>
	$(function() {
		$('#stockiestIncomeTable').DataTable({
			processing: true,
			serverSide: true,
			ajax:{ 
				url:'{{route('admin.report.data') }}',
				data:{type:'stockist'}
			},
			columns: [
			{ title:'ID', data: 'id' },
			{ title:'Amount', data: 'amount'},
			{ title:'Details', data: 'details'},
			{ title:'Status', data: 'status'},
			{ title:'Created At', data: 'created_at'}
			]
		});
	});
	
</script>
@endsection