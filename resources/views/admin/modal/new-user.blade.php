<!-- Add New Dealer Modal -->
<div class="modal fade" id="AddDealer" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Dealer/User Registration</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="AddDealerForm" action="{{ route('admin.delars.store') }}" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label"> Signup Type</label>
								<select class="signup_type form-control" name="signup_type">
									<option value="">Select Signup Type</option>
									@foreach ($roles as $item)
									<option value="{{$item->name}}">{{$item->name}}</option>
									@endforeach
								</select>
							</div>
							
							<div class="form-group dealer_info hide">
								<label class="control-label"> Sponsor Username</label>
								<input type="text" name="sponsor_id" class="form-control form-control-sm" placeholder="Sponsor Username" autocomplete="off">
								<span class="col-form-label sponsor_check_status"></span>
							</div>
							<div class="form-group dealer_info hide">
								<label class="control-label"> Dealer Type</label>
								<select class="form-control form-control-sm" name="dealer_type">
									<option value="">Select Dealer Type</option>
									<option value="company">Company</option>
									<option value="district">District</option>
									<option value="upazila">Upazila</option>
									<option value="union">Union</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="text" name="email" class="form-control form-control-sm" placeholder="Email">
							</div>
							<div class="form-group">
								<label class="control-label">Phone</label>
								<input type="text" name="phone" class="form-control form-control-sm" placeholder="Phone">
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
								<select class="form-control form-control-sm" name="country">
									<option value="">Select </option>
									@foreach($countrys as $country)
									<option value="{{$country->id}}">{{$country->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Division</label>
								<select class="form-control form-control-sm" name="state">
									<option value="">Select division</option>
									@foreach($divisions as $division)
									<option value="{{$division->id}}">{{$division->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Address</label>
								<textarea class="form-control form-control-sm" name="address" class="form-control form-control-sm"></textarea>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">New Transaction Pin:</label>
								<input type="password" class="form-control" name="user_txn_pin" placeholder="Transaction Pin" autocomplete="off">
							</div>
							<div class="form-group">
								<label class="control-label">Profile Picture</label>
								<input type="file" name="profile_picture" class="form-control form-control-sm form-control form-control-sm-file" accept="">
							</div>
							
							<div class="form-group">
								<label class="control-label">Name</label>
								<input type="text" name="name" class="form-control form-control-sm" placeholder="Name">
							</div>
							
							<div class="form-group">
								<label class="control-label">National Id </label>
								<input type="text" name="national_id" class="form-control form-control-sm" placeholder="National Id">
							</div>
							<div class="form-group">
										<label class="control-label">Mother Name</label>
										<input type="text" name="mother_name" id="mother_name" class="form-control form-control-sm" placeholder="Mother Name">
									</div>
							<div class="form-group">
								<label class="control-label">Post Code</label>
								<input type="text" name="post_code" class="form-control form-control-sm" placeholder="Post Code">
							</div>
							
							<div class="form-group">
								<label class="control-label">District</label>
								<select class="form-control form-control-sm" name="city">
									<option>Select district</option>
									@foreach($districts as $district)
									<option value="{{$district->id}}">{{$district->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group dealer_info hide">
								<label class="control-label">Thana/Upazilla</label>
								<select class="form-control form-control-sm upazila_hide" name="upazila_id">
									<option>Select Thana/Upazilla</option>
									@foreach($upazilas as $upazila)
									<option value="{{$upazila->id}}" class="district_{{$upazila->district_id}}">{{$upazila->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group dealer_info hide">
								<label class="control-label">Union</label>
								<input type="text" name="union" class="form-control form-control-sm" placeholder="Enter Union Name">
							</div>
							
						</div>
					</div>
					<div class="row">
						
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Username</label>
								<input type="text" name="username" class="form-control form-control-sm" placeholder="Username" autocomplete="off">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="control-label">Password</label>
								<input type="password" name="password" class="form-control form-control-sm" placeholder="Password">
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
						<label class="control-label">Your Transaction Pin:</label>
						<input type="password" class="form-control" name="txn_pin" placeholder="Transaction Pin" autocomplete="off">
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