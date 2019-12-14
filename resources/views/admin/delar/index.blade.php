@extends('layouts.backend')
@section('title','Delers')

@section('css')

@endsection

@section('content')
		<div class="card">
		    <div class="card-header">
		        <h5>Review All Dealer</h5>
		        <button class="btn btn-sm btn-primary float-right mb-4 NewUser">Add New Dealer</button>
			</div>
		    <div class="card-block">
		        <div class="dt-responsive table-responsive">
		            <table id="DealersTable" class="table table-striped table-bordered nowrap text-center"></table>
				</div>
			</div>
		</div>
		<!-- Add New Dealer Modal -->
		<div class="modal fade" id="ViewUserModal" tabindex="-1" role="dialog">
		    <div class="modal-dialog modal-lg" role="document">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h4 class="modal-title">User Registration</h4>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
						</button>
					</div>
		            <div class="modal-body">
						<form id="UpdateMember" action="{{ route('admin.superadmin.member.update') }}" method="post" enctype="multipart/form-data">
							<input type="hidden" name="user_id" id="user_id">
							<div class="row">
									<div class="col-sm-12 text-center">
										<img src="{{asset('public/assets/frontend/images/default.jpg')}}" style="height: 100px; width:130px;" class="img-responsive rounded-circle" id="image">
									</div>
								</div>
								<br>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label"> Signup Type</label>
										<select class="user_type form-control" id="user_type" name="user_type">
											<option value="">Select Signup Type</option>
											@foreach ($roles as $item)
											<option value="{{$item->name}}">{{$item->name}}</option>
											@endforeach
										</select>
									</div>
									
									<div class="form-group dealer_info hide">
										<label class="control-label"> Sponsor Username</label>
										<input type="text" id="sponsor_id" name="sponsor_id" class="form-control form-control-sm" placeholder="Sponsor Username">
										<span class="col-form-label sponsor_check_status"></span>
									</div>
									<div class="form-group">
										<label class="control-label">Email</label>
										<input type="text" name="email" id="email" class="form-control form-control-sm" placeholder="Email">
									</div>
									<div class="form-group">
										<label class="control-label">Phone</label>
										<input type="text" name="phone" id="phone" class="form-control form-control-sm" placeholder="Phone">
									</div>
									<div class="form-group">
										<label class="control-label">Father Name</label>
										<input type="text" name="father_name" id="father_name" class="form-control form-control-sm" placeholder="Father Name">
									</div>
									<div class="form-group">
											<label class="control-label">Nomine Name</label>
											<input type="text" name="nomine_name" id="nomine_name" class="form-control form-control-sm" placeholder="Nomine Name">
										</div>
									<div class="form-group">
										<label class="control-label">Country</label>
										<select class="form-control form-control-sm" id="country" name="country">
											<option>Select </option>
											@foreach($countrys as $country)
											<option value="{{$country->id}}">{{$country->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label class="control-label">Division</label>
										<select class="form-control form-control-sm" id="state" name="state">
											<option>Select division</option>
											@foreach($divisions as $division)
											<option value="{{$division->id}}">{{$division->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label class="control-label">Address</label>
										<textarea class="form-control form-control-sm" id="address" name="address" class="form-control form-control-sm"></textarea>
									</div>
								</div>
								<div class="col-sm-6">
									
									<div class="form-group">
										<label class="control-label">Profile Picture</label>
										<input type="file" name="profile_picture" id="profile_picture" class="form-control form-control-sm form-control form-control-sm-file" accept="">
									</div>
									
									<div class="form-group">
										<label class="control-label">Name</label>
										<input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="Name">
									</div>
									
									<div class="form-group">
										<label class="control-label">National Id </label>
										<input type="text" name="national_id" class="form-control form-control-sm" id="national_id" placeholder="National Id">
									</div>
									<div class="form-group">
										<label class="control-label">Post Code</label>
										<input type="text" name="post_code" class="form-control form-control-sm" id="post_code" placeholder="Post Code">
									</div>

									<div class="form-group">
										<label class="control-label">Mother Name</label>
										<input type="text" name="mother_name" id="mother_name" class="form-control form-control-sm" placeholder="Mother Name">
									</div>
									
									<div class="form-group">
										<label class="control-label">District</label>
										<select class="form-control form-control-sm" id="city" name="city">
											<option>Select district</option>
											@foreach($districts as $district)
											<option value="{{$district->id}}">{{$district->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group dealer_info hide">
										<label class="control-label">Thana/Upazilla</label>
										<select class="form-control form-control-sm" id="upazila" name="upazila">
											<option>Select Thana/Upazilla</option>
											@foreach($upazilas as $upazila)
											<option value="{{$upazila->id}}">{{$upazila->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group dealer_info hide">
										<label class="control-label">Union</label>
										<input type="text" name="user_union" class="form-control form-control-sm" id="user_union" placeholder="Enter Union Name">
									</div>
									
								</div>
							</div>
							<div class="row">
								
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label">Username</label>
										<input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Username">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label">Password</label>
										<input type="password" name="password"  class="form-control form-control-sm" placeholder="Password">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="control-label">Retype Password</label>
										<input type="password" name="retype_password" class="form-control form-control-sm" placeholder="Retype Password">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">You Transaction Pin:</label>
								<input type="password" class="form-control" name="txn_pin" id="txn_pin" placeholder="Transaction Pin" autocomplete="off">
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
		            <div class="modal-footer">
		                <button type="button" class="btn btn-sm btn-default waves-effect " data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
@endsection
@extends('admin.modal.new-user')
@section('js')
<script>
	$(document).ready(function(){
		
		$('#DealersTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('admin.delars.data') }}',
			columns: [
			{ title:'Serial', data: 'id'},
			{ title:'Username', data: 'username'},
			{ title:'Name', data: 'name'},
			{ title:'Email', data: 'email'},
			{ title:'Phone', data: 'phone'},
			{ title:'National ID', data: 'national_id'},
			{ title:'State', data: 'state'},
			{ title:'City', data: 'city'},
			{ title:'Action', data: 'action'},
			]
		});

		$(document).on('click','.ViewMember',function(){
			let Id = $(this).data('id');
			$.ajax({
				type: 'get',
				url: '{{ url('admin/superadmin/member/data/') }}/'+Id ,
				success: function(data){
					$img = 'download.png';
					if(data.profile_picture!=null || data.profile_picture == ''){
						$img = data.profile_picture;
					}
					$("#user_id").val(data.id);
					$("#user_type").val(data.user_type);
					$("#name").val(data.name);
					$("#email").val(data.email);
					$("#phone").val(data.phone);
					$("#country").val(data.country);
					$("#state").val(data.state);
					$("#city").val(data.city);
					$("#post_code").val(data.post_code);
					$("#national_id").val(data.national_id);
					$("#address").val(data.address);
					$("#txn_pin").val(data.txn_pin);
					$("#position").val(data.position);
					$("#user_id").val(data.id);
					$("#upazila").val(data.upazila);
					$("#user_union").val(data.user_union);
					$("#username").val(data.username);
					
					$("#father_name").val(data.father_name);
					$("#mother_name").val(data.mother_name);
					$("#nomine_name").val(data.nomine_name);

					if(data.user_type == 'admin'){
						$(".dealer_info").removeClass('hide');
					}
					$("#image").attr('src','{{asset("public/upload/user")}}/'+$img);
					$("#ViewUserModal").modal("toggle");
				}
			});
		});

		$(document).on('click','.NewUser',function(){
			$("#AddDealer").modal('toggle');
		});

		$('#UpdateMember').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
			},
			resetForm:false
		});
		
		// Image Rendering
        function readURL(input,el) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$(el).attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
		}
		
        $("#profile_picture").change(function() {
            readURL(this,'#image ');
		});
		
		$(document).on('change','.signup_type',function(){
			let type = $(this).val();
			$(".dealer_info").addClass('hide');
			if(type == 'dealer'){
				$(".dealer_info").removeClass('hide');
			}
		});
		
		$('#AddDealerForm').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$("#DealersTable").DataTable().draw(true);
			},
			resetForm:true
		});
		
		$(document).on("change keyup",'input[name="sponsor_id"]',function(){
			usernameCheck($(this),'.sponsor_check_status');
		});
		
		$(document).on("change keyup",'input[name="city"]',function(){
			$(".upazila_hide").find("option").hide();
		});
		
	})
</script>
@endsection																				