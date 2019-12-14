@extends('layouts.backend')
@section('title','Banner')

@section('css')

@endsection

@section('content')
<div class="card">
		<div class="card-body">
            <form id="bannerForm" method="post" action="{{route('add.banner')}}" novalidate>
                @isset($data)
                     <input type="hidden" name="id" value="@isset($data){{$data->id}}@endisset">
                @endisset
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Banner Name:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="bannerName" name="bannerName" placeholder="Enter Banner Name" value="@isset($data){{$data->banner_name}}@endisset">
						<span class="messages"></span>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Banner Sort:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="bannerSort" name="bannerSort" placeholder="Enter Banner Sort" value="@isset($data){{$data->banner_sort}}@endisset">
						<span class="messages"></span>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Banner Description:</label>
					<div class="col-sm-10">
						<textarea rows="5" cols="5" class="form-control" placeholder="Enter Banner Description" name="bannerDes" id="bannerDes" >@isset($data){{$data->banner_des}}@endisset</textarea>
						<span class="messages"></span>
					</div>
				</div>	

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Banner Type:</label>
					<div class="col-sm-10">
						<select class="form-control form-control-sm" name="bannerType" id="bannerType">
							<option value="">Select Type</option>
                            <option value="HomeBanner" @isset($data)@if($data->banner_type == 'HomeBanner') selected @endif @endisset>Home Banner</option>
                            <option value="CategoryBanner" @isset($data)@if($data->banner_type == 'CategoryBanner') selected @endif @endisset>Category Banner</option>
							<option value="BrandBanner" @isset($data)@if($data->banner_type == 'BrandBanner') selected @endif @endisset>Brand Banner</option>
							<option value="Slide" @isset($data)@if($data->banner_type == 'Slide') selected @endif @endisset>Slide</option>
						</select>
						<span class="messages"></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Banner Image:</label>
					<div class="col-sm-10">
                        <input type="file" class="form-control form-control-sm" id="bannerImage" name="bannerImage">
                        <?php 
                                if(isset($data) && isset($data['banner_image']) ){
                            ?>
                                <img src="{{asset('public/')}}/{{$data['banner_image']}}" id="image_preview" class="rounded float-left mt-3" style="height: 100px; width:100px;">
                            <?php } 
                            else{
                            ?>
                                <img src="" id="image_preview" class="rounded float-left d-none mt-3" style="height: 100px; width:100px;">
                            <?php 
                                }
                        ?>
                    </div>
                   
				</div>	

				<div class="form-group row">
				    <label class="col-sm-2 col-form-label">Status</label>
				    <div class="col-sm-10">
				    	<select class="form-control form-control-sm" name="bannerStatus" id="bannerStatus">
				    		<option value="">Select Status</option>
				    		<option value="Active"  @isset($data)@if($data->banner_status == 'Active') selected @endif @endisset>Active</option>
				    		<option value="Inactive"  @isset($data)@if($data->banner_status == 'Inactive') selected @endif @endisset>Inactive</option>
				    	</select>
				        <span class="messages"></span>
				    </div>
				</div>	
				
				<div class="form-group row">
					<label class="col-sm-2"></label>
					<div class="col-sm-10 ">
						<div class="float-right">
							<button type="submit" class="btn btn-sm btn-primary m-b-0">Submit</button>
							<button type="submit" class="btn btn-sm btn-danger m-b-0 ml-2 ">Reset</button>
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
			$('#bannerForm').ajaxForm({
				error: formError,
				success: function (responseText, statusText, xhr, $form) {
					formSuccess(responseText, statusText, xhr, $form);
					
				},
				resetForm:true
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

                $("#bannerImage").change(function() {
                    $('#image_preview').addClass('d-none');
                    readURL(this,'#image_preview');
                    $('#image_preview').removeClass('d-none');
                });
		});
	</script>
@endsection