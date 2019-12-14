@extends('layouts.backend')
@section('title','Add Product')

@section('css')

@endsection

@section('content')
	<div class="card">
		<div class="card-body">
			
			<form id="productForm" method="post" action="{{route('admin.product.store')}}" novalidate>
				@if(isset($product))
				<input type="hidden" name="id" value="{{$product->id}}">
				@endif
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
						    <label class="col-form-label">Category</label>
						    <div class="">
						    	<select class="form-control form-control-sm" name="categoryId" id="categoryId">
						    		@if(!empty($categories))
						    		@foreach($categories as $category)
						    		<option value="{{ $category->id }}"
						    			@if(isset($product->category_id) && $product->category_id == $category->id)
						    			selected=""
						    			@endif 
						    			>{{$category->category_name}}</option>
						    		@endforeach
						    		@endif
						    	</select>
						        <span class="messages"></span>
						    </div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
						    <label class="col-form-label">Brand</label>
						    <div class="">
						    	<select class="form-control form-control-sm" name="brandId" id="brandId">
						    		@if(!empty($brands))
						    		@foreach($brands as $brand)
						    		<option value="{{$brand->id}}"
						    			@if(isset($product->brand_id) && $product->brand_id == $brand->id)
						    			selected=""
						    			@endif
						    			>{{$brand->brand_name}}</option>
						    		@endforeach
						    		@endif
						    	</select>
						        <span class="messages"></span>
						    </div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group ">
						    <label class="col-form-label">Unit</label>
						    <div class="">
						    	<select class="form-control form-control-sm" name="unitId" id="unitId">
						    		@if(!empty($units))
						    		@foreach($units as $unit)
						    		<option value="{{$unit->id}}"
						    			@if(isset($product->unit_id) && $product->unit_id == $unit->id)
						    			selected=""
						    			@endif
						    			>{{$unit->unit_name}}</option>
						    		@endforeach
						    		@endif
						    	</select>
						        <span class="messages"></span>
						    </div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-form-label">Product Name:</label>
							<div class="">
								<input type="text" class="form-control" id="productName" name="productName" placeholder="Enter Product Name"
								value="@if(isset($product->product_name)){{$product->product_name}}@endif">
								<span class="messages"></span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-form-label">Product Code:</label>
							<div class="">
								<input type="text" class="form-control" id="productCode" name="productCode" @if(isset($product->product_code))readonly="" @endif placeholder="Enter Product Code" value="@if(isset($product->product_code)){{$product->product_code}}@endif">
								<span class="messages"></span>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-form-label"> Product Base Price:</label>
							<div class="">
								<input type="text" class="form-control" id="productBasePrice" name="productBasePrice" placeholder="Enter Product Base Price" value="@if(isset($product->product_base_price)){{$product->product_base_price}}@endif">
								<span class="messages"></span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-form-label">Product Discount Price:</label>
							<div class="">
								<input type="text" class="form-control" id="productDiscountPrice" name="productDiscountPrice" placeholder="Enter Product Discount Price" value="@if(isset($product->product_discount_price)){{$product->product_discount_price}}@endif">
								<span class="messages"></span>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-form-label">Product Vat:</label>
							<div class="">
								<input type="text" class="form-control" id="productVat" name="productVat" placeholder="Enter Product Vat" value="@if(isset($product->product_vat)){{$product->product_vat}}@endif">
								<span class="messages"></span>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-form-label">Product Point:</label>
							<div class="">
								<input type="text" class="form-control" id="productPoint" name="productPoint" placeholder="Enter Product Point" value="@if(isset($product->product_point)){{$product->product_point}}@endif" >
								<span class="messages"></span>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
						    <label class="col-form-label">Feature</label>
						    <div class="">
						    	<select class="form-control form-control-sm" name="product_featured" id="product_featured">
						    		<option value="">Select Feature</option>
						    		<option value="True">Featured</option>
						    		<option value="False">Uneatured</option>
						    	</select>
						        <span class="messages"></span>
						    </div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
						    <label class="col-form-label">Type</label>
						    <div class="">
						    	<select class="form-control form-control-sm" name="productType" id="productType">
						    		<option value="">Product Type</option>
						    		<option value="Single"
						    		@if(isset($product->product_type) && $product->product_type == 'Single')
										selected="" 
									@endif
						    		 >Single</option>
						    		<option value="Bundle"
						    		@if(isset($product->product_type) && $product->product_type == 'Bundle')
										selected="" 
									@endif
						    		>Bundle</option>
						    	</select>
						        <span class="messages"></span>
						    </div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
						    <label class="col-form-label">Status</label>
						    <div class="">
						    	<select class="form-control form-control-sm" name="productStatus" id="productStatus">
						    		<option value="">Select Status</option>
						    		<option value="active"
						    		@if(isset($product->product_status) && $product->product_status == 'active')
										selected="" 
									@endif
						    		>Active</option>
						    		<option value="inactive"
						    		@if(isset($product->product_status) && $product->product_status == 'inactive')
										selected="" 
									@endif
						    		>Inactive</option>
						    	</select>
						        <span class="messages"></span>
						    </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-form-label">Product Description:</label>
							<div class="">
							<textarea rows="2" cols="5" class="form-control form-control-sm"placeholder="Product Description" id="productDes" name="productDes">@if(isset($product->product_des)){{$product->product_des}}@endif</textarea>
								<span class="messages"></span>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-form-label">Product Image:</label>
							<div class="">
								<input type="file" id="productImg" class="form-control form-control-sm" name="productImg">
							</div>
							<?php 
                                if(isset($product) && isset($product->product_image) ){
                                 ?>
                                <img src="{{asset('public/')}}/{{$product->product_image}}" id="image_preview" class="rounded float-left" style="height: 100px; width:100px;">
                                <?php } 
                                else{
                                ?>
                                <img src="" id="image_preview" class="rounded float-left d-none" style="height: 100px; width:100px;">
                                 <?php 
                                }
                                ?>
						</div>	
					</div>
					
				</div>
					
				<div class="form-group row">
					<label class="col-sm-2"></label>
					<div class="col-sm-10 ">
						<div class="float-right">
							<button type="submit" class="btn btn-sm btn-primary m-b-0 ">Submit</button>
							<button type="reset" class="btn btn-sm btn-danger m-b-0 ml-2 ">Reset</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('js')
	<script>
		$(function() {
			$('#productForm').ajaxForm({
				error: formError,
				success: function (responseText, statusText, xhr, $form) {
					formSuccess(responseText, statusText, xhr, $form);
				},
				resetForm:true
			});

	        $("#productImg").change(function() {
	            $('#image_preview').addClass('d-none');
	            readURL(this,'#image_preview');
	            $('#image_preview').removeClass('d-none');
	        });
		});

		function readURL(input,el) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $(el).attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
          }
        }
	</script>
@endsection