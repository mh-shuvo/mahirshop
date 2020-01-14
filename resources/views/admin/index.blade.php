@extends('layouts.backend') 
@section('title','Dashboard') 
@section('css') 

@endsection 

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="bg-image"  style="background-image: url('{{asset("public/assets/images/photo8@2x.jpg")}}');background-position: 100% 100%"
        >
		<div class="bg-black-50">
		<div class="content content-full text-center">
		<div class="my-3">
		@if(Auth::user()->profile_picture != null)
		<img class="img-avatar img-avatar-thumb rounded-circle" src="{{asset("public/upload/user")}}/{{Auth::user()->profile_picture}}" alt="" style="height: 220px; width: 250px;">
		@else
		<img class="img-avatar img-avatar-thumb" src="{{asset('public/backend/assets/media/avatars/avatar13.jpg')}}" alt="">
		@endif
		</div>
		<h1 class="h2 text-white mb-0">{{Auth::user()->name}}</h1>
		<span class="text-white">{{Auth::user()->phone}}</span><br>
		@hasanyrole('admin|manager|dealer|accountant')
		@hasrole('admin')
		<span class="text-white">
			SuperAdmin 
		</span>
		@endhasrole
		@hasrole('dealer')
		<span class="text-white">
			Dealer 
		</span>
		@endhasrole
		@hasrole('manager')
		<span class="text-white">
			Manager 
		</span>
		@endhasrole
		@hasrole('accountant')
		<span class="text-white">
			Accountant 
		</span>
		@endhasrole
		@else
		@if($memberTree->is_premium) 
		<span class="text-white">
			Premium 
		</span>
		@else 
		<span class="text-white freeText">
			Free 
		</span><br>
		<span class="text-white upgradeButton">
			<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#packageModal">Upgrade</button>
		</span>
		<span class="text-white renewButton">
			<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#renewModal">Renew</button>
		</span>
		@endif
		@endhasanyrole
		<span class="text-white upgradeButton">
			<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#packageModal">Upgrade</button>
		</span>
		
		
	</div>
</div>
</div>
@hasanyrole('user|admin')
<div class="bg-white border-bottom">
	<div class="content content-boxed">
		<div class="row items-push text-center">
			<div class="col-6 col-md-6">
				<div class="font-size-sm font-w600 text-muted text-uppercase">Username</div>
				<a class="link-fx" href="javascript:void(0)">{{Auth::user()->username}}</a>
			</div>
			<div class="col-6 col-md-6">
				<div class="font-size-sm font-w600 text-muted text-uppercase">Designation</div>
				<a class="link-fx" href="javascript:void(0)">
					@if($memberTree->designation)
					{{$memberTree->memberDesignation->designation_title}} ({{$memberTree->designation}})
					@else
					Member
					@endif
				</a>
			</div>
		</div>
	</div>
</div>
@endhasanyrole
</div>
<div class="col-lg-8">
	<div class="row">
		@hasanyrole('user|admin')
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center">
						<div>
							<i class="mdi mdi-emoticon font-20 text-muted"></i>
							<p class="font-16 m-b-5">Total Earning</p>
						</div>
						<div class="ml-auto">
							<h1 class="font-light text-right">{{$totalBonus->total_bonus}} <small>Tk</small></h1>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		@endhasanyrole
		
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center">
						<div>
							<i class="mdi mdi-emoticon font-20 text-muted"></i>
							<p class="font-16 m-b-5">TopUp Balance</p>
						</div>
						<div class="ml-auto">
							<h1 class="font-light text-right">{{$totalTopup->topup_avaliable}} <small>Tk</small></h1>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center">
						<div>
							<i class="mdi mdi-emoticon font-20 text-muted"></i>
							<p class="font-16 m-b-5">Current Balance</p>
						</div>
						<div class="ml-auto">
							<h1 class="font-light text-right">{{$withdrawal->current_balance}} <small>Tk</small></h1>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		@hasanyrole('user|admin|dealer')
		
		
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center">
						<div>
							<i class="mdi mdi-emoticon font-20 text-muted"></i>
							<p class="font-16 m-b-5">Total Withdrawal</p>
						</div>
						<div class="ml-auto">
							<h1 class="font-light text-right">{{$withdrawal->withdrawal_amount}} <small>Tk</small></h1>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		@endhasanyrole
		
		@hasanyrole('user|admin')
		
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center">
						<div>
							<i class="mdi mdi-emoticon font-20 text-muted"></i>
							<p class="font-16 m-b-5">Sponsor Income</p>
						</div>
						<div class="ml-auto">
							<h1 class="font-light text-right">{{$totalBonus->sponsor}} <small>Tk</small></h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center">
						<div>
							<i class="mdi mdi-emoticon font-20 text-muted"></i>
							<p class="font-16 m-b-5">Stockist Sponsor Bonus</p>
						</div>
						<div class="ml-auto">
							<h1 class="font-light text-right">{{$totalBonus->stockist_sponsor}} <small>Tk</small></h1>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		@endhasanyrole
		@hasanyrole('user|admin|dealer')
		@hasanyrole('admin|user')
		
		
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center">
						<div>
							<i class="mdi mdi-emoticon font-20 text-muted"></i>
							<p class="font-16 m-b-5">Matching Royalty Income</p>
						</div>
						<div class="ml-auto">
							<h1 class="font-light text-right">{{$totalBonus->mega_matching}} <small>Tk</small></h1>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		@endhasanyrole
		
		
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center">
						<div>
							<i class="mdi mdi-emoticon font-20 text-muted"></i>
							<p class="font-16 m-b-5">Stockist Royalty Bonus</p>
						</div>
						<div class="ml-auto">
							<h1 class="font-light text-right">{{$totalBonus->stockist_royalty}} <small>Tk</small></h1>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		
		
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center">
						<div>
							<i class="mdi mdi-emoticon font-20 text-muted"></i>
							<p class="font-16 m-b-5">Stockist  Bonus</p>
						</div>
						<div class="ml-auto">
							<h1 class="font-light text-right">{{$totalBonus->stockist}}<small>Tk</small></h1>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		@endhasanyrole
		@hasanyrole('user|admin')
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center">
						<div>
							<i class="mdi mdi-emoticon font-20 text-muted"></i>
							<p class="font-16 m-b-5">Total Member</p>
						</div>
						<div class="ml-auto">
							<h1 class="font-light text-right">{{($memberTree->r_member + $memberTree->l_member)}}</h1>
						</div>
					</div>
					
				</div>
			</div>
		</div>		
		
		<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center">
						<div>
							<i class="mdi mdi-emoticon font-20 text-muted"></i>
							<p class="font-16 m-b-5">Premium Member</p>
						</div>
						<div class="ml-auto">
							<h1 class="font-light text-right">@if($extraData['total_member']['premium']) {{$extraData['total_member']['premium']}} @else 0 @endif</h1>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		@endhasanyrole
	</div>
</div> 
@hasanyrole('user|admin')
<div class="modal" id="packageModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Upgrade</h4>
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="{{route('package.upgrade')}}" method="post" id="PackageUpgradeForm">
				<div class="modal-body">
					
					<div class="form-group">
						<label class="control-label">Upgrade Package:</label>
						<select class="form-control" name="package_id">
							<option value="">Select Upgrade Package</option>
							@foreach(App\Package::where('package_type','upgrade')->get() as $package)
							<option value="{{$package->id}}">{{$package->title}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn  btn-info" type="submit">Upgrade Now</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<div class="modal" id="renewModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Account Renew</h4>
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="{{route('package.renew')}}" method="post" id="AccountRenewForm">
				<div class="modal-body">
					
					<div class="form-group">
						<label class="control-label">Renew Package:</label>
						<select class="form-control" name="package_id">
							<option value="">Select Renew Package</option>
							@foreach(App\Package::where('package_type','renew')->get() as $package)
							<option value="{{$package->id}}">{{$package->title}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn  btn-info" type="submit">Renew Now</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endhasanyrole
@endsection 
@section('js')
<script type="text/javascript">
	@hasanyrole('user|admin')
	$(document).ready(function() {
		$('#PackageUpgradeForm').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('.freeText').html('Premium');
				$('.upgradeButton').remove();
			},
			resetForm:true
		});
		$('#AccountRenewForm').ajaxForm({
			error: formError,
			success: function (responseText, statusText, xhr, $form) {
				formSuccess(responseText, statusText, xhr, $form);
				$('.freeText').html('Premium');
				$('.renewButton').remove();
			},
			resetForm:true
		});
	});
	@endhasanyrole
	
</script>
@endsection																																															