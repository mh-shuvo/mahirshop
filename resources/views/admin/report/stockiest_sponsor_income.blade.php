@extends('layouts.backend')
@section('title','Stockiest Sponsor Income Report')
@section('css')

@endsection
@section('content')
<div class="block">
	<div class="block-content">
		<table id="stockiestSponsorIncomeTable" class="table table-striped table-bordered"></table>
	</div>
</div>
@endsection

@section('js')
<script>
	$(function() {
		$('#stockiestSponsorIncomeTable').DataTable({
			processing: true,
			serverSide: true,
			ajax:{ 
				url:'{{route('admin.report.data') }}',
				data:{type:'stockist_sponsor'}
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