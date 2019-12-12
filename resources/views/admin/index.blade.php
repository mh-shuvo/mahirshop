@extends('layouts.backend') 
@section('title','Dashboard') 
@section('css') 

@endsection 

@section('content')
<div class="row">
    <div class="col-lg-4 widget widget1 card">
        <div class="bg-image widget-content"  style="background-image: url('{{asset("public/backend/assets/media/photos/photo8@2x.jpg")}}');"
        >
			<div class="bg-black-50">
				<div class="content content-full text-dark text-center">
					<div class="my-3">
						@if(Auth::user()->profile_picture != null)
							<img class="img-avatar img-avatar-thumb rounded-circle" src="{{asset("public/upload/user")}}/{{Auth::user()->profile_picture}}" alt="">
						@else
							<img class="img-avatar img-avatar-thumb rounded-circle" src="{{asset('public/backend/assets/media/avatars/avatar13.jpg')}}" alt="">
						@endif
					</div>
					<h1 class="h2 mb-0">{{Auth::user()->name}}</h1>
					<span class="text-white-75">{{Auth::user()->phone}}</span><br>
					@hasanyrole('admin|manager|dealer|accountant')
						@hasrole('admin')
							<span class="text-white-75">
								SuperAdmin 
							</span>
						@endhasrole
						@hasrole('dealer')
							<span class="text-white-75">
								Dealer 
							</span>
						@endhasrole
						@hasrole('manager')
							<span class="text-white-75">
								Manager 
							</span>
						@endhasrole
						@hasrole('accountant')
							<span class="text-white-75">
								Accountant 
							</span>
						@endhasrole
						@else
						@if($memberTree->is_premium) 
						<span class="text-white-75">
							Premium 
						</span>
						@else 
						<span class="text-white-75 freeText">
							Free 
						</span><br>
						<span class="text-white-75 upgradeButton">
							<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#packageModal">Upgrade</button>
						</span>
						@endif
					@endhasanyrole
				</div>
			</div>
		</div>
		@hasanyrole('user|admin')
		<div class="border-bottom">
			<div class="content content-boxed">
				<div class="row items-push text-center">
					<div class="col-6 col-md-6">
						<div class="font-size-sm font-w600 text-dark text-uppercase">Team A</div>
						<a class="link-fx font-size-h3" href="javascript:void(0)">{{$memberTree->l_member}}</a>
					</div>
					<div class="col-6 col-md-6">
						<div class="font-size-sm font-w600 text-dark text-uppercase">Team B</div>
						<a class="link-fx font-size-h3" href="javascript:void(0)">{{$memberTree->r_member}}</a>
					</div> 
					<div class="col-6 col-md-6">
						<div class="font-size-sm font-w600 text-dark text-uppercase">Username</div>
						<a class="link-fx" href="javascript:void(0)">{{Auth::user()->username}}</a>
					</div>
					<div class="col-6 col-md-6">
						<div class="font-size-sm font-w600 text-dark text-uppercase">Designation</div>
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
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">

			        <div class="title text-secondary h2">{{$totalBonus->total_bonus}} <small>Tk</small></div>

			        <div class="sub-title h6 text-dark">Total Earning</div>

			    </div>
			</div>
		</div>
		@endhasanyrole
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">

			        <div class="title text-secondary h2">{{$totalTopup->topup_avaliable}} <small>Tk</small></div>

			        <div class="sub-title h6 text-dark">TopUp Balance</div>

			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">
			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	@if($memberTree->is_premium) 
			        <div class="title text-secondary h2">{{$totalPoint->point_available}} <small>Tk</small></div>
			        @else
			        <div class="title text-secondary h2">{{$totalPoint->point_available}} <small>Tk</small></div>
			        @endif
			        <div class="sub-title h6 text-dark">Current PV</div>

			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">

			        <div class="title text-secondary h2">{{$withdrawal->current_balance}} <small>Tk</small></div>

			        <div class="sub-title h6 text-dark">Current Balance</div>

			    </div>
			</div>
		</div>
	</div>
	<br>
	@hasanyrole('user|admin')
	<div class="row">
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">

			        <div class="title text-secondary h2">@if($memberTree->total_matching) {{$memberTree->total_matching}} @else 0 @endif <small>Tk</small></div>

			        <div class="sub-title h6 text-dark">Total Matching</div>

			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			        <div class="title text-secondary h2">@if($memberTree->l_matching) {{$memberTree->l_matching}} @else 0 @endif <small>Tk</small></div>
			        <div class="sub-title h6 text-dark">Team A</div>
			    </div>
			</div>

		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">@if($memberTree->r_matching) {{$memberTree->r_matching}} @else 0 @endif <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Team B</div>


			    </div>
			</div>
		</div>

		<div class="col-6 col-md-3 col-lg-6 col-xl-3">

			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">

			        <div class="title text-secondary h2">{{abs($memberTree->l_matching - $memberTree->r_matching)}} <small>Tk</small></div>
			        <div class="sub-title h6 text-dark">Carry Forward</div>

			    </div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		@endhasanyrole
		@hasanyrole('user|admin|dealer')
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{$withdrawal->withdrawal_amount}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Total Withdrawal</div>


			    </div>
			</div>
		</div>
		@endhasanyrole
		@hasanyrole('user|admin')
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{$totalBonus->sponsor}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Sponsor Income</div>


			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{$totalBonus->matching}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Matching Income</div>


			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{$totalBonus->achiever}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Achiever Royalty Income</div>


			    </div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{$totalBonus->chairman_club}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Chairman Club Income</div>


			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{$totalBonus->nsm_royalty}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">N.S.M Royalty Income</div>


			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{$totalBonus->ed_royalty}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">E.D Royalty Income</div>


			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{$totalBonus->stockist_sponsor}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Stockist Sponsor Bonus</div>


			    </div>
			</div>
		</div>
	</div>
	<br>
	@endhasanyrole
	@hasanyrole('user|admin|dealer')
	<div class="row">
		@hasanyrole('admin|user')
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{$totalBonus->mega_matching}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Matching Royalty Income</div>


			    </div>
			</div>
		</div>
		@endhasanyrole
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{$totalBonus->stockist_royalty}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Stockist Royalty Bonus</div>


			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{$totalBonus->stockist}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Stockist Bonus</div>


			    </div>
			</div>
		</div>
	</div>
	<br>
	@endhasanyrole
	@hasanyrole('user|admin')
	<div class="row">
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">{{($memberTree->r_member + $memberTree->l_member)}} <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Total Member</div>


			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">@if($extraData['total_member']['premium']) {{$extraData['total_member']['premium']}} @else 0 @endif <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Premium Member</div>


			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">@if($extraData['total_member']['premium_l']) {{$extraData['total_member']['premium_l']}} @else 0 @endif <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Team A Premium</div>


			    </div>
			</div>
		</div>
		<div class="col-6 col-md-3 col-lg-6 col-xl-3">
			<div class="widget widget1 card">

			    <div class="widget-content pt-2 pb-8 d-flex flex-column align-items-center justify-content-center">
			    	<div class="title text-secondary h2">@if($extraData['total_member']['premium_r']) {{$extraData['total_member']['premium_r']}} @else 0 @endif <small>Tk</small></div>
			    	<div class="sub-title h6 text-dark">Team B Premium</div>


			    </div>
			</div>
		</div>
	</div>
	<br>
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
						<p class="control-label">Upgrade Required PV: {{config('mlm.premium_registration_point')}}</p>
						<p class="control-label">Available PV: {{$totalPoint->point_available}}</p>
					</div>
					<div class="form-group">
						<label class="control-label">Transaction Pin:</label>
						<input type="password" class="form-control" name="txn_pin" placeholder="Transaction Pin" autocomplete="off">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn  btn-info" type="submit">Upgrade Now</button>
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
	});
	@endhasanyrole
	
</script>
@endsection																																											