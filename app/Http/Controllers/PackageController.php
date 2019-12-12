<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Yajra\Datatables\Datatables;
	use App\Traits\PointTrait;
	use App\Traits\UserTrait;
	use App\MemberTree;
	use App\Point;
	use App\MemberBonus;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Carbon;
	
	class PackageController extends Controller
	{
		use PointTrait,UserTrait;
		
		public function upgrade(Request $request)
		{
			
			if(!$this->getTxnPinCheck($request->txn_pin)){
				return response()->json([
				'status' => 'errors',
				'message' => 'Transaction Pin Is Not Correct. Please Try again'
				],422);
			}
			$totalPoint = $this->AvaliablePointByUser();
			
			if ($totalPoint->point_available < config('mlm.premium_registration_point')) {
				return response()->json([
				'status' => 'error',
				'message' => 'You need more '.(config('mlm.premium_registration_point') - $totalPoint->point_available).' PV for upgrade your account.'
				],422);
			}
			$getMember = MemberTree::where('user_id', Auth::User()->id)->first();
			
			Point::create([
			'user_id' => Auth::User()->id,
			'from_user_id' =>  Auth::User()->id,
			'point_amount' => config('mlm.premium_registration_point'),
			'point_flow' => 'out',
			'point_details' => 'You have Upgrade your account with '.config('mlm.premium_registration_point').' PV',
			'point_status' => 'active'
			]);
			
			$getMember->is_premium = Carbon::now();
			$getMember->save();
			
			new SendSmsController([Auth::User()->phone],'Your Account successfully upgrade to Premium with '.config('mlm.premium_registration_point').' PV','upgrade');
			
			
			return response()->json([
			'status' => 'success',
			'message' => 'Your Account successfully upgrade to Premium'
			]);
			
		}
	}
