@extends('layouts.backend') @section('title','Sign Up') @section('content')
<div class="block" style="margin-top: -30px;">
	<div class="block-content">
		<form id="NewMemberForm" action="{{route('admin.superadmin.member.store')}}" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="control-label"> Sponsor Username</label>
					<input type="text" name="sponsor_id" class="form-control form-control-sm" placeholder="Sponsor Username" autocomplete="off">
					<span class="col-form-label sponsor_check_status"></span>
				</div>
				<div class="form-group col-sm-6">
					<label class="control-label">Name</label>
					<input type="text" name="name" class="form-control form-control-sm" placeholder="Name">
				</div>
				<div class="form-group col-sm-6">
					<label class="control-label">Placement Username</label>
					<input type="text" name="placement_id" class="form-control form-control-sm" placeholder="Placement Username" autocomplete="off">
					<span class="col-form-label placement_check_status"></span>
				</div>
				
				<div class="form-group col-sm-6">
					<label class="control-label">Email</label>
					<input type="text" name="email" class="form-control form-control-sm" placeholder="Email">
				</div>
				
				<div class="form-group col-sm-6">
					<label class="control-label"> Team Select</label>
					<br>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="placement_position" id="placement_position" value="A">
						<label class="form-check-label" for="placement_position">Team A</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="placement_position" id="placement_position" value="B">
						<label class="form-check-label" for="placement_position">Team B</label>
					</div>
				</div>
				
				
				<div class="form-group col-sm-6">
					<label class="control-label">Phone</label>
					<input type="text" name="phone" class="form-control form-control-sm" placeholder="Phone">
				</div>
				
				<div class="form-group col-sm-6">
					<label class="control-label">New Transaction Pin</label>
					<input type="password" name="user_txn_pin" class="form-control form-control-sm" placeholder="Transaction Pin" autocomplete="off">
				</div>
				
				<div class="form-group col-sm-6">
					<label class="control-label">National Id </label>
					<input type="text" name="national_id" class="form-control form-control-sm" placeholder="National Id">
				</div>
				<div class="form-group col-sm-6">
					<label class="control-label">Father Name</label>
					<input type="text" name="father_name" class="form-control form-control-sm" placeholder="Father Name">
				</div>
				<div class="form-group col-sm-6">
					<label class="control-label">Mother Name</label>
					<input type="text" name="mother_name" class="form-control form-control-sm" placeholder="Mother Name">
				</div>
				<div class="form-group col-sm-6">
					<label class="control-label">Nomine Name</label>
					<input type="text" name="nomine_name" class="form-control form-control-sm" placeholder="Nomine Name">
				</div>
				
				<div class="form-group col-sm-6">
					<label class="control-label">Sponsor Transaction Pin:</label>
					<input type="password" class="form-control" name="txn_pin" placeholder="Transaction Pin" autocomplete="off">
				</div>
				
				<div class="form-group col-sm-6">
					<label class="control-label">Address</label>
					<textarea class="form-control form-control-sm" name="address" class="form-control form-control-sm"></textarea>
				</div>
				
				<div class="form-group col-sm-6">
					<label class="control-label">Profile Picture</label>
					<input type="file" name="profile_picture" class="form-control form-control-sm form-control form-control-sm-file" accept="">
				</div>
				
				<div class="form-group col-sm-6">
					<label class="control-label">Country</label>
					<select class="form-control form-control-sm" name="country">
						<option>Select </option>
						@foreach($countrys as $country)
						<option value="{{$country->id}}">{{$country->name}}</option>
						@endforeach
					</select>
				</div>
				
				
				
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label">Username</label>
						<input type="text" name="username" class="form-control form-control-sm" placeholder="Username" autocomplete="off">
					</div>
				</div>
				<div class="form-group col-sm-6">
					<label class="control-label">Division</label>
					<select class="form-control form-control-sm" name="state">
						<option>Select division</option>
						@foreach($divisions as $division)
						<option value="{{$division->id}}">{{$division->name}}</option>
						@endforeach
					</select>
				</div>
				
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label">Password</label>
						<input type="password" name="password" class="form-control form-control-sm" placeholder="Password" autocomplete="off">
					</div>
				</div>
				
				<div class="form-group col-sm-6">
					<label class="control-label">District</label>
					<select class="form-control form-control-sm" name="city">
						<option>Select district</option>
						@foreach($districts as $district)
						<option value="{{$district->id}}">{{$district->name}}</option>
						@endforeach
					</select>
				</div>
				
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label">Retype Password</label>
						<input type="password" name="retype_password" class="form-control form-control-sm" placeholder="Retype Password" autocomplete="off">
					</div>
				</div>
				
				
				<div class="form-group col-sm-6">
					<label class="control-label">Post Code</label>
					<input type="text" name="post_code" class="form-control form-control-sm" placeholder="Post Code">
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