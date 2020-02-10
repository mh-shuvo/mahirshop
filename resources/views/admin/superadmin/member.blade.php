@extends('layouts.backend')
@section('title','Member')

@section('css')

@endsection

@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-12">
				<a href="{{route('admin.superadmin.member.create')}}" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-plus"></i> New Member</a>
				<a href="javascript:void(0)" class="btn btn-primary btn-sm placement_transfer_model"> <i class="fa fa-plus"></i> Renew Account</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="dt-responsive table-responsive">
			<table id="base-style" class="table table-striped table-bordered nowrap text-center MembersTable">
			</table>
		</div>
	</div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="Member" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add User jbproduct To Merchant Sponsor</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="main" method="post" action="/" novalidate>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Selected User</label>
						<div class="col-sm-9">
							<input type="text" class="form-control form-control-sm" name="User" id="User" placeholder="Enter User" readonly="">
							<span class="messages"></span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Transaction Password</label>
						<div class="col-sm-9">
							<input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Enter Transaction Password">
							<span class="messages"></span>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-3 col-form-label">User Position</label>
						<div class="col-sm-9">
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input" type="radio" name="Merchant" id="merchantSpo" value="option1"> Merchant Sponsor
								</label>
							</div>
							<div class="form-check form-check-inline">
								<label class="form-check-label">
									<input class="form-check-input" type="radio" name="Merchant" id="Merchant" value="option2"> Merchant
								</label>
							</div>
							<span class="messages"></span>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default waves-effect " data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-sm btn-primary waves-effect waves-light" id="addJbporduct">Save</button>
			</div>
		</div>
	</div>
</div>

<!-- ViewMember Modal -->
<div class="modal fade" id="ViewMemberModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><span id="name_span">Member</span> Details</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="UpdateMember" method="post" action="{{route('admin.superadmin.member.update')}}" enctype="multipart/form-data">
				<input type="hidden" name="user_id" id="user_id">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12 text-center">
							<img src="{{asset('public/assets/frontend/images/default.jpg')}}" style="height: 100px; width:130px;" class="img-responsive rounded-circle" id="image">
						</div>
					</div>
					<br>
					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Name</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="Name">
								<input type="hidden" name="id" id="user_id" class="form-control">
							</div>
							
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="text" name="email" id="email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<label class="control-label">Phone</label>
								<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
							</div>
							
							
							<div class="form-group">
								<label class="control-label">Country</label>
								<select class="form-control" name="country" id="country">
									<option>Select </option>
									@foreach ($countrys as $item)
									<option value="{{ $item->id }}"> {{$item->name}} </option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Division</label>
								<select class="form-control" name="state" id="state">
									<option>Select division</option>
									@foreach ($divisions as $item)
									<option value="{{ $item->id }}"> {{$item->name}} </option>
									@endforeach
								</select>
							</div>
							
							<div class="form-group">
								<label class="control-label">District</label>
								<select class="form-control" name="city" id="city">
									<option>Select district</option>
									@foreach ($districts as $item)
									<option value="{{ $item->id }}"> {{$item->name}} </option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Mother Name</label>
								<input type="text" name="mother_name" id="mother_name" class="form-control form-control-sm" placeholder="Mother Name">
							</div>
						</div>
						<div class="col-sm-6">
							
							<div class="form-group">
								<label class="control-label">Position </label>
								<input type="text" name="position" class="form-control" readonly='' id="position" placeholder="Position">
								
							</div>
							
							<div class="form-group">
								<label class="control-label">Transaction Pin</label>
								<input type="text" name="txn_pin" class="form-control"  id="txn_pin" placeholder="Transaction Pin">
							</div>
							<div class="form-group">
								<label class="control-label">Profile Picture</label>
								<input type="file" name="profile_picture" id="profile_picture" class="form-control form-control-file" accept="">
							</div>
							
							
							
							<div class="form-group">
								<label class="control-label">National Id </label>
								<input type="text" name="national_id" id="national_id" class="form-control" placeholder="National Id">
							</div>
							<div class="form-group">
								<label class="control-label">Post Code</label>
								<input type="text" name="post_code" id="post_code" class="form-control" placeholder="Post Code">
							</div>
							
							<div class="form-group">
								<label class="control-label">Father Name</label>
								<input type="text" name="father_name" id="father_name" class="form-control form-control-sm" placeholder="Father Name">
							</div>
							
							<div class="form-group">
								<label class="control-label">Nomine Name</label>
								<input type="text" name="nomine_name" id="nomine_name" class="form-control form-control-sm" placeholder="Nomine Name">
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label">Address</label>
								<textarea class="form-control" name="address" id="address" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						
						<div class="form-group">
							<label class="control-label">Password</label>
							<input type="password" id="password" name="password" class="form-control" placeholder="Password">
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-default waves-effect " data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Status Modal -->
<div class="modal fade" id="Status" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Suspend/Active Member</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="main" method="post" action="/" novalidate>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label"> Suspend/Active</label>
						<div class="col-sm-9">
							<input type="text" class="form-control form-control-sm" name="sus_or_act" id="sus_or_act" placeholder="Enter Suspend/Active Member">
							<span class="messages"></span>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default waves-effect " data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-sm btn-primary waves-effect waves-light" id="actInact">Active/Inactive</button>
			</div>
		</div>
	</div>
</div>

<!-- Reffrel Modal -->
<div class="modal fade" id="FreeSignupModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Free Signup</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="false">&times;</span>
				</button>
			</div>
			<form id="FreeSignupForm" method="POST" action="{{route('admin.superadmin.member.freesignup')}}">
				<div class="modal-body">
					<input type="hidden" class="form-control form-control-sm" name="userId" id="userId" placeholder="Enter User Id">
					<div class="form-group">
						<label class="col-form-label">Number of free account</label>
						<input type="text" class="form-control form-control-sm" name="free_account" id="free_account" placeholder="Enter number of free account">	
					</div>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-default waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="PlacementTransferModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
            	<h4>Renew Manualy</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="fa fa-remove"></span></button>
			</div>
            <div class="modal-body">
            	<form id="renewForm" action="{{route('admin.superadmin.placement')}}" method="post">
	                <div class="form-group">
						<label class="control-label">Username:</label>
	                	<input type="text" name="username" placeholder="Username" class="form-control" autocomplete="off">
						<span class="col-form-label username_check_status"></span>
					</div>
					<div class="form-group">
						<label class="control-label">Renew For (Month):</label>
	                	<input type="number" name="renew_for" placeholder="Renew For" class="form-control" autocomplete="off">
					</div>
	                <div class="form-group">
	                	<button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary btn-sm pull-right transferdCupon">Change</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')

<script type="text/javascript">
	$(document).ready(function() {
		$('.MembersTable').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('admin.superadmin.member.data') }}',
			columns: [
			{ title:'Name', data: 'name'},
			{ title:'Username', data: 'username'},
			{ title:'Phone', data: 'phone'},
			{ title:'Transaction Pin', data: 'txn_pin'},
			{ title:'Sponsor', data: 'sponsor'},
			{ title:'Renew Date', data: 'is_renewed'},
			{ title:'Banned Status', data: 'is_banned'},
			{ title:'Purchase Package Value', data: 'package_value'},
			{ title:'Joining Date', data: 'created_at'},
			{ title:'User Type', data: 'user_type'},
			{ title:'Action', data: 'action'},
			]
		});
		
		$(document).on('click','.ViewMember',function(){
			let Id = $(this).data('id');
			$.ajax({
				type: 'get',
				url: '{{ url('admin/superadmin/member/data/') }}/'+Id ,
				success: function(data){
					$("#user_id").val(data.id);
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
					$("#father_name").val(data.father_name);
					$("#mother_name").val(data.mother_name);
					$("#nomine_name").val(data.nomine_name);
					$("#password").val(data.password);
					$("#image").attr('src','{{asset("public/upload/user")}}/'+data.profile_picture);
					$("#ViewMemberModal").modal("toggle");
				}
			});
		});
		
		$(document).on('click','.changePremiumStatus',function(){
			let Id = $(this).data('id');
			$.ajax({
				type: 'post',
				url: '{{ Route('admin.member.change.premium') }}',
				data:{
					id:Id
				},
				success: function(data){
					$(".MembersTable").DataTable().draw(true)
				}
			});
		});
		
		$(document).on('click','.changeBannedStatus',function(){
			let Id = $(this).data('id');
			$.ajax({
				type: 'get',
				url: '{{ Route('admin.member.change.banned') }}',
				data:{
					id:Id
				},
				success: function(data){
					$(".MembersTable").DataTable().draw(true)
				}
			});
		});
		
		$('#renewForm').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
			},
			resetForm:true
		});
		
		$('#UpdateMember').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
			},
			resetForm:false
		});
		
		$(document).on("click",'.placement_transfer_model',function(){
			$("#PlacementTransferModal").modal('toggle');
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
			readURL(this,'#image');
		});
		$(document).on('click','.FreeSignup',function(){
			let Id = $(this).data('id');
			$("#userId").val(Id);
			$("#FreeSignupModal").modal('toggle');
		});
		$("#FreeSignupForm").ajaxForm({
			error: formError,
			success: function(responseText, statusText,xhr,$form){
				formSuccess(responseText, statusText,xhr,$form);
				$(".MembersTable").DataTable().draw(true)
			},
			resetForm: false
		});
		
		$(document).on("change keyup",'input[name="placement_username"]',function(){
			usernameCheck($(this),'.placement_username_check_status');
		});
		
		$(document).on("change keyup",'input[name="username"]',function(){
			usernameCheck($(this),'.username_check_status');
		});
	});
</script>

@endsection				