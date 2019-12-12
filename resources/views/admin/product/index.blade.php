@extends('layouts.backend')
@section('title','Product List')

@section('css')

@endsection

@section('content')
<div class="block">
	<div class="block-content">
		<div class="table-responsive">
			<table id="productTable" class="table table-bordered table-striped table-vcenter"></table>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
	$(function() {
		$('#productTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{ route('admin.product.data') }}',
			columns: [
            { title:'Code', data: 'product_code'},
            { title:'Product Image',
            	orderable:false,
            	render: function(data,type,row){
            		return '<img src = "{{asset('public')}}/'+row.product_image+'" alt="'+row.product_name+'" style="height:60px; width:70px;">';
				}
			},
            { title:'Category', data: 'category_id'},
            { title:'Brand', data: 'brand_id'},
            { title:'Unit', data: 'unit_id'},
            { title:'Name', data: 'product_name'},
            { title:'Base Price', data: 'product_base_price'},
            { title:'Disc Price', data: 'product_discount_price'},
            // { title:'Vat', data: 'product_vat'},
            { title:'Point', data: 'product_point'},
            { title:'Featured', data: 'product_featured'},
            { title:'Status', data: 'product_status'},
            { title:'Action', data: 'action'},
			]
		});
	});
</script>
@endsection	