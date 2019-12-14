@extends('layouts.backend')
@section('title','Profile')
@section('content')
<div class="row">

    <div class="col-lg-8">
        <!-- Block Tabs Default Style -->
        <div class="card">
            <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                <li class="nav-item active show">
                    <a class="nav-link" data-toggle="tab" href="#profile1" role="tab" aria-selected="false">Update Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages1" role="tab" aria-selected="false">Profile Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings1" role="tab" aria-selected="true">Transaction Password</a>
                </li>
            </ul>
            <div class="card-body tab-content">
                <div class="tab-pane active show" id="profile1" role="tabpanel">
                    <h4 class="font-w400">Update Profile Information</h4>
                    <div class="row">
                        <div class="col-sm-12 col-xl-12">
                            <!-- Basic Inputs Validation start -->

                            <form id="updateProfile" method="post" action="{{route('user.update.profile')}}" novalidate="">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">E-Mail</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter valid e-mail address" value="{{ Auth::user()->email }}" readonly="">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Joining Date</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Enter Joining Date" value="{{ Auth::user()->created_at }}" readonly="">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Profile Picture</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="profile_picture" id="profile_picture">
                                        <span class="messages"></span>
                                        <img src="" id="image_preview" class="rounded float-left d-none mt-3" style="height: 100px; width:100px;">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                    <textarea class="form-control" id="address" name="address" placeholder="Enter Address" required="">{{Auth::user()->address}}</textarea>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Country</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="country" id="country">
                                            <option>Select Country</option>
                                            @foreach($countrys as $country)
                                            <option value="{{$country->id}}" @if (Auth::user()->country == $country->id )
                                                Selected=''
                                            @endif >{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">State</label>
                                    <div class="col-sm-10">
                                        <select name="state" class="form-control">
                                            <option value="">Select State</option>
                                            @foreach($divisions as $division)
                                            <option value="{{$division->id}}" @if (Auth::user()->state == $division->id )
                                                Selected=''
                                            @endif>{{$division->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <select name="city" class="form-control">
                                            <option value="">Select City</option>
                                            @foreach($districts as $district)
                                            <option value="{{$district->id}}" @if (Auth::user()->city == $district->id)
                                                Selected=''
                                            @endif>{{$district->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Post Code</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="post_code" id="post_code" placeholder="Enter your post code" value="{{ Auth::user()->postcode }}">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-10 text-left">
                                        <button type="submit" class="btn btn-sm btn-primary m-b-0">Update</button>
                                        <button type="reset" class="btn btn-sm btn-danger m-b-0 ml-2">Refresh</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="messages1" role="tabpanel">
                    <h4 class="font-w400">Profile Password</h4>
                    <div class="row">
                        <div class="col-sm-12 col-xl-12">
                            <!-- Basic Inputs Validation start -->

                            <form id="updatePassword" method="post" action="{{route('user.update.password')}}" novalidate="">
                               
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Current Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Current Password">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Re-New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="renew_password" name="renew_password" placeholder="Re-New Password">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-10 text-left">
                                        <button type="submit" class="btn btn-sm btn-primary m-b-0">Submit</button>
                                        <button type="submit" class="btn btn-sm btn-danger m-b-0 ml-2">Refresh</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="settings1" role="tabpanel">
                    <h4 class="font-w400">Transaction Pin</h4>
                    <div class="row">
                        <div class="col-sm-12 col-xl-12">

                            <form id="updateTxnPassword" method="post" action="{{route('user.update.txn.password')}}" novalidate="">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Current Pin</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="current_pin" name="current_pin" placeholder="Current Pin">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">New Pin</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="txn_pin" name="txn_pin" placeholder="New Pin">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Re-New Pin</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="renew_pin" name="renew_pin" placeholder="Re-New Pin">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-10 text-left">
                                        <button type="submit" class="btn btn-sm btn-primary m-b-0">Submit</button>
                                        <button type="submit" class="btn btn-sm btn-danger m-b-0 ml-2">Refresh</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Block Tabs Default Style -->

    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">
    $(document).ready(function() {

        $('#updateProfile').ajaxForm({
            error: formError,
            success: function (responseText, statusText, xhr, $form) {
                formSuccess(responseText, statusText, xhr, $form);
            },
            resetForm:false
        });

        $('#updatePassword').ajaxForm({
            error: formError,
            success: function (responseText, statusText, xhr, $form) {
                formSuccess(responseText, statusText, xhr, $form);
            },
            resetForm:true
        });

        $('#updateTxnPassword').ajaxForm({
            error: formError,
            success: function (responseText, statusText, xhr, $form) {
                formSuccess(responseText, statusText, xhr, $form);
            },
            resetForm:true
        });
        
    });
    $("#profile_picture").change(function() {
		 $('#image_preview').addClass('d-none');
        readURL(this,'#image_preview');
         $('#image_preview').removeClass('d-none');
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