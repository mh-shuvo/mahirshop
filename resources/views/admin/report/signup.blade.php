@extends('layouts.backend')
@section('title','Registration Report')
@section('css')

@endsection
@section('content')
<div class="card">
	<div class="card-body">
		<table id="RegistrationTable" class="table table-striped table-bordered"></table>
	</div>
</div>
@endsection

@section('js')
<script>
		$(function() {
			$('#RegistrationTable').DataTable({
				processing: true,
				serverSide: true,
				ajax:{ 
					url:'{{route('admin.report.registrationData') }}'
				 },
				columns: [
	            { title:'ID', data: 'id' },
	            { title:'Name', data: 'name'},
	            { title:'Username', data: 'username'},
	            { title:'Phone', data: 'phone'},
	            { title:'Registration Date', data: 'created_at'},
				]
			});
		});

	</script>
@endsection