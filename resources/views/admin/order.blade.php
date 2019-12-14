@extends('layouts.backend')
@section('title','Order')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered text-center" id="OrderTable"></table>
        </div>
    </div>   
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('#OrderTable').DataTable({
					processing: true,
					serverSide: true,
					ajax: '{{route('admin.order.data') }}',
					columns: [
		            { title:'Serial', data: 'id'},
		            { title:'Order Amount', data: 'order_amount'},
		            { title:'Order Type', data: 'order_delivery_type'},
		            { title:'Total Point', data: 'order_total_point'},
		            { title:'Delivery Status', data: 'order_delivery_status'},
		            { title:'Order Status', data: 'order_status'},
		            { title:'Action', data: 'action'},
					]
				});
        })
    </script>
@endsection