@extends('layouts.backend')
@section('title','Incentive Report')
@section('css')

@endsection
@section('content')
<div class="block">
	<div class="block-content">
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
				ajax: '',
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