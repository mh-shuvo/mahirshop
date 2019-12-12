@extends('layouts.backend') @section('title','Sign Up') @section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
    		<div class="card-body">
				<form id="NewMemberForm" action="{{route('admin.superadmin.member.store')}}" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-sm-6">
							
							<input type="text" name="sponsor_id" id="sponsor_id" class="form-control form-control-sm" autocomplete="off">
							<label class="control-label ml-4" for="sponsor_id"> Sponsor Username</label>
							<span class="col-form-label sponsor_check_status"></span>
						</div>
						<div class="form-group col-sm-6">
							
							<input type="text" name="name" id="name" class="form-control form-control-sm">
							<label class="control-label ml-4" for="name">Name</label>
						</div>
						<div class="form-group col-sm-6">
							
							<input type="text" name="placement_id" id="placement_id" class="form-control form-control-sm" autocomplete="off">
							<label class="control-label ml-4" for="placement_id">Placement Username</label>
							<span class="col-form-label placement_check_status"></span>
						</div>
						
						<div class="form-group col-sm-6">
							
							<input type="text" name="email" id="email" class="form-control form-control-sm" >
							<label class="control-label ml-4" for="email">Email</label>
						</div>
						
						<div class="form-group col-sm-6">
							<label class="control-label"> Team Select</label>
							{{-- <div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="placement_position" id="placement_position" value="A">
								<label class="form-check-label" for="placement_position">Team A</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="placement_position" id="placement_position" value="B">
								<label class="form-check-label" for="placement_position">Team B</label>
							</div> --}}

							<div class="form-check form-check-inline">
							    <label class="form-check-label">
							        <input class="form-check-input" type="radio" name="placement_position" id="inlineRadio1" value="A">
							        <span class="radio-icon fuse-ripple-ready"></span>
							        <span class="form-check-description">Team A</span>
							    </label>
							    <label class="form-check-label">
							        <input class="form-check-input" type="radio" name="placement_position" id="inlineRadio2" value="B">
							        <span class="radio-icon fuse-ripple-ready"></span>
							        <span class="form-check-description">Team B</span>
							    </label>
							</div>

						</div>


						
						
						<div class="form-group col-sm-6">
							
							<input type="text" name="phone" id="phone" class="form-control form-control-sm" >
							<label class="control-label ml-4" for="phone">Phone</label>
						</div>
						
						<div class="form-group col-sm-6">
							
							<input type="password" name="user_txn_pin" id="user_txn_pin" class="form-control form-control-sm" autocomplete="off">
							<label class="control-label ml-4" for="user_txn_pin">New Transaction Pin</label>
						</div>
						
						<div class="form-group col-sm-6">
							
							<input type="text" name="national_id" id="national_id" class="form-control form-control-sm">
							<label class="control-label ml-4" for="national_id">National Id </label>
						</div>
						<div class="form-group col-sm-6">
							
							<input type="text" name="father_name" id="father_name" class="form-control form-control-sm">
							<label class="control-label ml-4" for="father_name">Father Name</label>
						</div>
						<div class="form-group col-sm-6">
							
							<input type="text" name="mother_name" id="mother_name" class="form-control form-control-sm">
							<label class="control-label ml-4" for="mother_name">Mother Name</label>
						</div>
						<div class="form-group col-sm-6">
							
							<input type="text" name="nomine_name" id="nomine_name" class="form-control form-control-sm">
							<label class="control-label ml-4" for="nomine_name">Nomine Name</label>
						</div>
						
						<div class="form-group col-sm-6">
							
							<input type="password" class="form-control" name="txn_pin" id="txn_pin" autocomplete="off">
							<label class="control-label ml-4" for="txn_pin">Sponsor Transaction Pin:</label>
						</div>
						
						<div class="form-group col-sm-6">
							
							<textarea class="form-control form-control-sm" name="address" id="address" class="form-control form-control-sm"></textarea>
							<label class="control-label ml-4" for="address">Address</label>
						</div>

						<div class="form-group col-sm-6">
						    <input type="file" class="custom-file-input" name="profile_picture" id="profile_picture">
						    <label class="custom-file-label ml-5" for="profile_picture">Profile Picture</label>
						</div>
						
						<div class="form-group col-sm-6">
							
							<select class="form-control form-control-sm" name="country" id="country">
								<option>Select </option>
								@foreach($countrys as $country)
								<option value="{{$country->id}}">{{$country->name}}</option>
								@endforeach
							</select>
						</div>
						
						
						
						<div class="col-sm-6">
							<div class="form-group">
								
								<input type="text" name="username" id="username" class="form-control form-control-sm" autocomplete="off">
								<label class="control-label ml-4" for="username">Username</label>
							</div>
						</div>
						<div class="form-group col-sm-6">
							
							<select class="form-control form-control-sm" name="state" id="state">
								<option>Select division</option>
								@foreach($divisions as $division)
								<option value="{{$division->id}}">{{$division->name}}</option>
								@endforeach
							</select>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group">
								
								<input type="password" id="password" name="password" class="form-control form-control-sm" autocomplete="off">
								<label class="control-label ml-4" for="password">Password</label>
							</div>
						</div>
						
						<div class="form-group col-sm-6">
							
							<select class="form-control form-control-sm" name="city" id="city">
								<option>Select district</option>
								@foreach($districts as $district)
								<option value="{{$district->id}}">{{$district->name}}</option>
								@endforeach
							</select>
						</div>
						
						<div class="col-sm-6">
							<div class="form-group">
								
								<input type="password" name="retype_password" id="retype_password" class="form-control form-control-sm" autocomplete
								="off">
								<label class="control-label ml-4" for="retype_password">Retype Password</label>
							</div>
						</div>
						
						
						<div class="form-group col-sm-6">
							<input type="text" id="post_code" name="post_code" class="form-control form-control-sm" >
							<label for="post_code" class="control-label ml-4">Post Code</label>
						</div>
						
						
						
					</div>			
					<div class="row">
						<div class="col-sm-2 offset-sm-5">
							<div class="form-group">
								<button class="btn btn-info btn-block btn-round" type="submit"> Submit </button>
							</div>
						</div>
					</div>
				</form>
		</div>
	</div>
	</div>
</div>

@endsection

@section('js') 

<script type="text/javascript">
	$(document).ready(function(){
		
		$('#NewMemberForm').submit(function(event){
			event.preventDefault();
			swal({
				title: "Signup Confirmation!",
				text: "Are you sure to signup new member?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, submit it!",
				cancelButtonText: "No, cancel plx!",
				closeOnConfirm: false,
				showLoaderOnConfirm: true,
				closeOnCancel: false
			},
			function(isConfirm) {
				if (isConfirm) {
					$('#NewMemberForm').ajaxSubmit({
						error: formError,
						success: function (responseText, statusText, xhr, $form) {
							formSuccess(responseText, statusText, xhr, $form);
							$('.sponsor_check_status').html('');
							$('.placement_check_status').html('');
						},
						resetForm:true
					});
					} else {
					swal("Cancelled", "You have cancelled your form submition successfully", "error");
				}
			});
			
		});
		
		$(document).on("change keyup",'input[name="sponsor_id"]',function(){
			usernameCheck($(this),'.sponsor_check_status');
		});
		
		$(document).on("change keyup",'input[name="placement_id"]',function(){
			usernameCheck($(this),'.placement_check_status');
		});
		
	})
</script>

@endsection					