@extends('layouts.backend')
@section('title','Banner List')

@section('css')

@endsection

@section('content')
<div class="card">
		<div class="card-header text-right">
		<a href="{{route('admin.banner.create')}}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Banner</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
					<table class="table table-striped table-bordered BannerTable"></table>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script>
		$(function() {
			$(".BannerTable").DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('admin.banner.data') }}',
			columns: [
            { title:'SL. No', data: 'id'},
            { title:'Title', data: 'banner_name'},
            { title:'Image',
				orderable:false,
				render: function(data, type, row){
					return '<img src="{{asset('public')}}/'+row.banner_image+'" style="height:50px; width:150px;">';
				}
			},
            { title:'Type', data: 'banner_type'},
            { title:'Status', data: 'banner_status'},
            { title:'Created At', data: 'created_at'},
            { title:'Action', data: 'action'},
			]
		});
		});
	</script>
@endsection