@extends('layouts.backend')
@section('title','Order Report')
@section('css')

@endsection
@section('content')
<div class="card">
	<div class="card-body">
		<table id="OrderTable" class="table table-striped table-bordered"></table>
	</div>
</div>
@endsection

@section('js')
<script>
		$(function() {
			$('#OrderTable').DataTable({
				processing: true,
				serverSide: true,
				ajax:{ 
					url:'{{route('admin.report.orderData') }}'
				 },
				columns: [
	            { title:'ID', data: 'id' },
	            { title:'Amount', data: 'topup_amount'},
	            { title:'Details', data: 'topup_details'},
	            { title:'Status', data: 'topup_status'},
	            { title:'Order Date', data: 'created_at'},
				]
			});
		});

	</script>
@endsection