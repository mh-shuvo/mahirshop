@extends('layouts.backend')
@section('title','Order')
@section('content')
    <div class="card">
        <div class="card-body">
                @if (Session::has('status'))
                <div class="alert alert-success">
                    {{ Session('status') }}
                </div>
                @endif
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
					ajax: '{{route('admin.superadmin.order.data') }}',
					columns: [
		            { title:'Serial', data: 'id'},
		            { title:'Username', data: 'username'},
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