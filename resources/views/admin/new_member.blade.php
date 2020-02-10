@extends('layouts.backend') @section('title','Sign Up') @section('content')

<form id="NewMemberForm" action="{{route('admin.superadmin.member.store')}}" method="post" enctype="multipart/form-data">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="form-group col-sm-3">
					<label class="control-label">Signup Package:</label>
					<select class="form-control form-control-sm" name="select_package">
						<option>Select Package</option>
						@foreach($packages as $package)
						<option value="{{$package->id}}">{{$package->title}} ({{$package->package_value}} Tk)</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label"> Sponsor Username</label>
					<input type="text" name="sponsor_id" class="form-control form-control-sm" placeholder="Sponsor Username" autocomplete="off">
					<span class="col-form-label sponsor_check_status"></span>
				</div>
				<div class="form-group col-sm-3">
					<label class="control-label">Placement Username:</label>
					<input type="text" name="placement_username" placeholder="Placement Username" class="form-control" autocomplete="off">
					<span class="col-form-label placement_username_check_status"></span>
				</div>
				<div class="form-group col-sm-3">
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
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="form-group col-sm-6">
					<label class="control-label">Name</label>
					<input type="text" name="name" class="form-control form-control-sm" placeholder="Name">
				</div>
				<div class="form-group col-sm-6">
					<label class="control-label">Email</label>
					<input type="text" name="email" class="form-control form-control-sm" placeholder="Email">
				</div>
				
				<div class="form-group col-sm-6">
					<label class="control-label">Phone</label>
					<input type="text" name="phone" class="form-control form-control-sm" placeholder="Phone">
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label">Username</label>
						<input type="text" name="username" class="form-control form-control-sm" placeholder="Username" autocomplete="off">
					</div>
				</div>
				
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label">Password</label>
						<input type="password" name="password" class="form-control form-control-sm" placeholder="Password" autocomplete="off">
					</div>
				</div>
				
				<div class="col-sm-6">
					<div class="form-group">
						<label class="control-label">Retype Password</label>
						<input type="password" name="retype_password" class="form-control form-control-sm" placeholder="Retype Password" autocomplete="off">
					</div>
				</div>
			</div>			
			<div class="row">
				<div class="col-sm-2 offset-sm-5">
					<div class="form-group">
						<button class="btn btn-info btn-block btn-round" type="submit"> Register Now </button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>


@endsection

@section('js') 

<script type="text/javascript">
	$(document).ready(function(){
		
		$('#NewMemberForm').submit(function(event){
			event.preventDefault();
			swal({
				title: "Registration Confirmation!",
				text: "Are you sure to regiter new member?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes!",
				cancelButtonText: "No!",
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
							$('.placement_username_check_status').html('');
						},
						resetForm:true
					});
					} else {
					swal("Cancelled", "You have cancelled your registration successfully", "error");
				}
			});
			
		});
		
		$(document).on("change keyup",'input[name="sponsor_id"]',function(){
			usernameCheck($(this),'.sponsor_check_status');
		});
		
		$(document).on("change keyup",'input[name="placement_username"]',function(){
			usernameCheck($(this),'.placement_username_check_status');
		});
		
	})
</script>

@endsection																																																											