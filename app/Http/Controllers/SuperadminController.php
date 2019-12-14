<?php
	
	namespace App\Http\Controllers;
	use App\User;
	use App\CuponCode;
	use App\Point;
	use App\MemberTree;
	use App\Traits\CouponTrait;
	use App\Traits\UserTrait;
	use App\Traits\MemberTreeTrait;
	use App\Traits\DealerTrait;
	use App\Http\Controllers\CuponCodeController\CouponCheck;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\Auth;
	use Yajra\Datatables\Datatables;
	use App\Country;
	use App\Orders;
	use App\StockManager;
	use App\Districts;
	use App\Divisions;
	use App\Role;
	use App\Dealer;
	use App\Upazila;
	use App\TopupBalance;
	use App\MemberBonus;
	use App\Withdrawal;
	use Image;
	use Session;
	
	class SuperadminController extends Controller
	{
		use CouponTrait,UserTrait,MemberTreeTrait,DealerTrait;
		
		
		public function userListData()
		{
			$data = User::whereIn('user_type',['accountant','manager','admin']);
			
			return Datatables::of($data)
			->addColumn('city',function($data){
				return $data->city? $data->City->name : '';
			})
			->addColumn('state',function($data){
				return $data->state? $data->State->name : '';
			})
			->addColumn('is_banned',function($user){
				if($user->is_banned == null){
					return "Not Banned";
				}
				else{
					return $user->is_banned;
				}
			})
			->addColumn('action', function ($user){
				return '<div class="dropdown-info dropdown open">
				<button class="btn btn-sm btn-success dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
				<div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
				<a class="dropdown-item waves-light waves-effect ViewMember" data-id="'.$user->id.'" href="javascript:void(0)">View</a>
				<a class="dropdown-item waves-light waves-effect changeBannedStatus" data-id="'.$user->id.'" href="javaScript:void(0)">Change Banned Status</a>
				</div>
				</div>';
			})
			->toJSON();
		}
		
		public function member()
		{
			$districts = Districts::all();
			$divisions = Divisions::all();
			$countrys  = Country::all();
			return view('admin.superadmin.member',compact('districts','divisions','countrys'));
		}
		
		public function paynow()
		{
			return view('admin.superadmin.pay_now');
		}
		public function topup()
		{
			return view('admin.superadmin.topup');
		}
		
		public function memberData()
		{
			$user = User::select('id','name','username','phone','is_banned','created_at','is_signup_without_payment','txn_pin','user_type')->where('user_type','user');
			
			return Datatables::of($user)
			->addColumn('action', function ($user){
				return '<div class="dropdown-info dropdown open">
				<button class="btn btn-sm btn-success dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
				<div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
				<a class="dropdown-item waves-light waves-effect ViewMember" data-id="'.$user->id.'" href="javascript:void(0)">View</a>
				<a class="dropdown-item waves-light waves-effect changeBannedStatus" data-id="'.$user->id.'" href="javaScript:void(0)">Change Banned Status</a>
				<a class="dropdown-item waves-light waves-effect changePremiumStatus" data-id="'.$user->id.'" href="javaScript:void(0)">Change Premium Status</a>
				<a class="dropdown-item waves-light waves-effect FreeSignup" data-id="'.$user->id.'" href="javaScript:void(0)">Free Signup</a>
				</div>
				</div>';
			})
			
			->addColumn('sponsor',function($user){
				if(!empty($user->MemberTree->sponsor_id)){
					return $this->getUsernameById($user->MemberTree->sponsor_id);
					}else{
					return 'System';
				}
			})
			->addColumn('is_signup_without_payment',function($user){
				if(empty($user->is_signup_without_payment)){
					return 'No';
				}
				else{
					return 'Free Signup : '.$user->is_signup_without_payment;
				}
			})
			->addColumn('is_banned',function($user){
				if($user->is_banned == null){
					return "Not Banned";
				}
				else{
					return $user->is_banned;
				}
			})
			->addColumn('premium',function($user){
				if( empty($user->MemberTree->is_premium)){
					return "Basic Member";
					}else{
					return "{$user->MemberTree->is_premium}";
				}
			})
			->toJson();
		}
		public function MemberFreeSignupSubmit(Request $request)
		{
			$data = User::find($request->userId);
			
			if($request->free_account == 0){
				$data->is_signup_without_payment = NULL;	
			}
			else{
				$data->is_signup_without_payment = $request->free_account;
			}
			
			$data->save();
			
			return response()->json([
			'status' => 'success',
			'message' => 'Successfully Updated'
			]);
		}
		public function getMemberCheck(Request $request)
		{
			$getUsersDetails = $this->getUsernameCheck($request->username);
			if($getUsersDetails){
				return response()->json([
				'status' => 'success',
				'message' => 'Name : '.$getUsersDetails->name
				]);
				}else{
				return response()->json([
				'status' => 'errors',
				'message' => "Username Is Not Valid"
				]);
			}
		}
		
		public function ChangePemiumStatus(Request $request)
		{
			$userData = User::find($request->id);
			$memberData = MemberTree::where('user_id',$request->id)->first();
			if($userData->is_premium != null){
				$userData->is_premium = null;
				}else{
				$userData->is_premium = date('Y-m-d');
			}
			$userData->save();
			
			if($memberData->is_premium != null){
				$memberData->is_premium = null;
				}else{
				$memberData->is_premium = date('Y-m-d');
			}
			$memberData->save();
			
			return redirect('admin/superadmin/member');
		}
		
		public function ChangeBannedStatus(Request $request)
		{
			$data = User::find($request->id);
			if($data->is_banned != null){
				$data->is_banned = null;
			}
			else{
				$data->is_banned = date('Y-m-d');
			}
			$data->save();
			return redirect('admin/superadmin/member');
		}
		
		public function UpdateMember(Request $request)
		{
			dd($request);
		}
		public function SingleMemberData($id)
		{
			return User::find($id);
		}
		
		public function topupData()
		{
			$data = TopupBalance::select('id','user_id','from_user_id','topup_amount','topup_type','topup_flow','topup_details','created_at','topup_generate_by');
			return Datatables::of($data)
			->addColumn('name',function ($data){
				if($data->user_id){
					return $data->User->username;
					}else{
					return ' - ';
				}
			})
			->addColumn('generate_by',function ($data){
				if($data->generate_by){
					// return $data->GenerateUser->username;
					}else{
					return ' - ';
				}
			})
			->addColumn('from_user',function ($data){
				if($data->from_user){
					// return $data->FromUser->username;
					}else{
					return ' - ';
				}
			})
			->toJson();
		}
		
		public function topupStore(Request $request){
			
			TopupBalance::create([
			'user_id' =>  $this->getIdByUsername($request->username),
			'from_user_id' => Auth::User()->id,
			'topup_amount' => $request->topup_amount,
			'topup_type' => 'admin',
			'topup_flow' => 'in',
			'topup_details' => 'You Received '.$request->topup_amount.' Tk TopUp Balance From System Administrator',
			'topup_generate_by' => Auth::User()->id,
			'topup_status' => 'active'
			]);
			
			return response()->json([
			'message' => 'Topup Successfully'
			]);
			
		}
		public function Order(){
			return view('admin.superadmin.order');
		}
		public function OrderData(){
			
			if(Auth::user()->hasRole('accountant') || Auth::user()->hasRole('manager')){
				$data = Orders::where('order_delivery_from','company');
				}elseif(Auth::user()->hasRole('dealer')){
				$data = Orders::where('order_delivery_from','dealer')->where('order_delivery_from_user_id', Auth::user()->id);
				}else{
				$data = Orders::get();
			}
			
			return Datatables::of($data)
			->addColumn('username',function($data){
				return $this->getUsernameById($data->user_id);
			})
			->addColumn('order_delivery_type',function($data){
				return $data->order_delivery_type=='cod' ? 'Cash On Delivery' : 'Self';
			})
			->addColumn('action',function($data){
				$actionButton = '<a href="'.route("admin.superadmin.order.single",['id' =>$data->id]).'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> ';
				if(Auth::user()->hasRole('admin')){
					$actionButton .='<a href="'.route("admin.superadmin.order.delete",['id' =>$data->id]).'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
				}
				return $actionButton;
			})
			->toJSON();
		}
		
		public function OrderSingle($id){
			// return $this->AvaliableDealerPointByUser();
			$data = array();
			$order = Orders::find($id);
			$products = StockManager::where('order_id',$id)->get();
			$order = Orders::find($id);
			$products = StockManager::where('order_id',$id)->get();
			return view('admin.superadmin.order_view',compact('order','products'));
		}
		
		public function OrderDelete($id)
		{
			Orders::find($id)->delete();
			StockManager::find($id)->delete();
			
			Session::flash('status', 'Task was successful!');
			return redirect('admin/superadmin/order');
		}
		
		public function report()
		{
			$users = User::where('user_type','user')->get();
			return view('admin.superadmin.report',compact('users'));
		}
		
		public function reportData(Request $request)
		{
			$data = MemberBonus::all();		
			return Datatables::of($data)
			->addColumn('username',function($data){
				return $this->getUsernameById($data->user_id);
			})
			->addColumn('from_user',function($data){
				return $this->getUsernameById($data->from_user_id);
			})
			->toJSON();
			
		}
		public function OrderStatusChange(Request $request){
			$data = Orders::find($request->id);
			$data->order_status = $request->status;
			$data->save();
			return response([
			"status" => 'success',
			"massage" => 'Complete',
			]);
		}
		
		public function OrderDeliveryStatusChange(Request $request){
			$orderData = Orders::find($request->id);
			if(!Auth::user()->hasRole('admin') && $orderData->order_delivery_status == 'Delivered' ){
				return response([
				"status" => 'error',
				"massage" => 'Already Delivered',
				],422);
			}
			if($request->status == 'Delivered'){
				$orderData->order_delivery_status = $request->status;
				$orderData->save();
				
				$orderItems = StockManager::where('delivery_user_id', Auth::User()->id)
				->where('order_id',$orderData->id)
				->update(['stock_status' => $request->status]);
				
				$memberData = MemberTree::where('user_id',Auth::User()->id)->first();
				
				$newStockist = $this->AvaliableDealerPointByUser()['new_stockist'] ;
				$newStockistPV = config('mlm.dealer_bonus_pv') * $newStockist;
				$unionBonus = config('mlm.dealer_union_bonus') * $newStockist;
				$upazilaBonus = config('mlm.dealer_upazila_bonus') * $newStockist;
				$districtBonus = config('mlm.dealer_district_bonus') * $newStockist;
				$companyBonus = config('mlm.dealer_company_bonus') * $newStockist;
				$dealerSponsorBonus = config('mlm.dealer_sponsor_bonus') * $newStockist;
				
				$userCheck = User::find($orderData->user_id);
				if($userCheck->hasRole('user')){
					if($newStockist > 0){
						if($memberData->sponsor_id){
							$stockistSponsorBonusData = new MemberBonus();
							$stockistSponsorBonusData->bonus_type = 'stockist_sponsor';
							$stockistSponsorBonusData->user_id = $memberData->sponsor_id;
							$stockistSponsorBonusData->from_user_id = Auth::User()->id;
							$stockistSponsorBonusData->amount = $dealerSponsorBonus;
							$stockistSponsorBonusData->status = 'active';
							$stockistSponsorBonusData->details = 'You have received '.$dealerSponsorBonus.' TK Stockist Sponsor Bonus for '.$newStockistPV.' PV sales commission from '.Auth::User()->username.' dealer.';
							$stockistSponsorBonusData->save();
						}
						
						if($orderData->Dealer->dealer_type == 'union'){
							$upazilaBonus = 50 * $newStockist;
							$districtBonus = 50 * $newStockist;
							}elseif($orderData->Dealer->dealer_type == 'upazila'){
							$districtBonus = 50 * $newStockist;
						}
						
						if($orderData->Dealer->dealer_type == 'union'){
							$unionBonusData = new MemberBonus();
							$unionBonusData->bonus_type = 'stockist';
							$unionBonusData->user_id = $orderData->order_delivery_from_user_id;
							$unionBonusData->from_user_id = $orderData->order_delivery_from_user_id;
							$unionBonusData->amount = $unionBonus;
							$unionBonusData->bonus_pv = $newStockistPV;
							$unionBonusData->status = 'active';
							$unionBonusData->details = 'You have received '.$unionBonus.' TK Stockist Bonus for '.$newStockistPV.' PV Sales Commission from '.Auth::User()->username.' dealer';
							$unionBonusData->save();
							$companyBonus = $companyBonus - $unionBonus;
						}
						
						if($orderData->Dealer->dealer_type == 'union' || $orderData->Dealer->dealer_type == 'upazila'){
							$getUpazila = Dealer::where('upazila_id', $orderData->Dealer->upazila_id)->where('dealer_type','upazila')->first();
							if($orderData->Dealer->upazila_id && $getUpazila){
								$upazilaBonusData = new MemberBonus();
								$upazilaBonusData->bonus_type = 'stockist';
								$upazilaBonusData->user_id = $getUpazila->user_id;
								$upazilaBonusData->from_user_id = $orderData->order_delivery_from_user_id;
								$upazilaBonusData->amount = $upazilaBonus;
								$upazilaBonusData->bonus_pv = $newStockistPV;
								$upazilaBonusData->status = 'active';
								$upazilaBonusData->details = 'You have received '.$upazilaBonus.' TK Stockist Bonus for '.$newStockistPV.' PV Sales Commission from '.Auth::User()->username.' dealer';
								$upazilaBonusData->save();
								$companyBonus = $companyBonus - $upazilaBonus;
							}
						}
						
						if($orderData->Dealer->dealer_type == 'union' || $orderData->Dealer->dealer_type == 'upazila' || $orderData->Dealer->dealer_type == 'district'){
							$getDistrict = Dealer::where('district_id',$orderData->Dealer->district_id)->where('dealer_type','district')->first();
							if($orderData->Dealer->district_id && $getDistrict){
								$districtBonusData = new MemberBonus();
								$districtBonusData->bonus_type = 'stockist';
								$districtBonusData->user_id = $getDistrict->user_id;
								$districtBonusData->from_user_id = $orderData->order_delivery_from_user_id;
								$districtBonusData->amount = $districtBonus;
								$districtBonusData->bonus_pv = $newStockistPV;
								$districtBonusData->status = 'active';
								$districtBonusData->details = 'You have received '.$districtBonus.' TK Stockist Bonus for '.$newStockistPV.' PV Sales Commission from '.Auth::User()->username.' dealer';
								$districtBonusData->save();
								$companyBonus = $companyBonus - $districtBonus;
							}
						}
					}
					
					if($companyBonus > 0 ){
    					$getCompany = Dealer::where('dealer_type','company')->first();
    					$companyBonusData = new MemberBonus();
    					$companyBonusData->bonus_type = 'stockist';
    					$companyBonusData->user_id = $getCompany->user_id;
    					$companyBonusData->from_user_id = $orderData->order_delivery_from_user_id;
    					$companyBonusData->amount = $companyBonus;
    					$companyBonusData->bonus_pv = $newStockistPV;
    					$companyBonusData->status = 'active';
    					$companyBonusData->details = 'You have received '.$companyBonus.' TK Stockist Bonus for '.$newStockistPV.' PV Sales Commission from '.Auth::User()->username.' dealer';
    					$companyBonusData->save();
					}
				}
				
				Point::create([
				'user_id' => $orderData->order_delivery_from_user_id,
				'from_user_id' =>  $orderData->user_id,
				'point_amount' => $orderData->order_total_point,
				'point_flow' => 'out',
				'point_details' => 'You have transfer '.$orderData->order_total_point.' PV for delivery order '.$orderData->getRouteKey().' to '.$orderData->User->username,
				'point_status' => 'active'
				]);
				
				return response([
				"status" => 'success',
				"massage" => 'Delivered',
				]);
				}else{
				return response([
				"status" => 'success',
				"massage" => 'Pending',
				]);
			}
		}
		
		public function Users()
		{
			$roles = Role::all();
			$districts = Districts::all();
			$divisions = Divisions::all();
			$countrys = Country::all();
			$upazilas = Upazila::all();
			return view('admin.users',compact('roles','districts','divisions','countrys','upazilas'));
		}
		public function Withdrow(){
			return view('admin.superadmin.withdrow');
		}
		public function withdrawData()
		{
			$data = Withdrawal::all();
			
			return Datatables::of($data)
			->addColumn('action',function($data){
				return '<a href="javascript:vodi(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm">Edit</a>
				<a href="javascript:void(0)" class="btn btn-danger btn-sm categoryDelete" data-id="'.$data->id.'"">Delete</a>';
			})
			->addColumn('username',function($data){
				return $this->getUsernameById($data->user_id);
			})
			->addColumn('action',function($data){
				return "<button class='btn btn-primary btn-sm ViewWithdraw' data-id='$data->id'>View</button>";
			})
			->toJson();
			
		}
		
		public function withdrawSubmit(Request $request)
		{
			
			if(!$this->getTxnPinCheck($request->txn_pin)){
				return response()->json([
				'status' => 'errors',
				'message' => 'Transaction Pin Is Not Correct. Please Try again'
				],422);
			}
			
			$withdrawal = $this->AvailableBalanceByUser();
			if($withdrawal->current_balance < $request->withdraw_amount){
				return response()->json([
				'status' => "error",
				'message' => "You don't have sufficient balance for withdraw"
				],422);
			}
			
			$memberTree = MemberTree::where('user_id', Auth::user()->id)->first();
			
			if(!$memberTree->is_premium){
				return response()->json([
				'status' => "error",
				'message' => "Withdrawal Denied. Please Upgrade your account to Premium Membership first"
				],422);
			}
			
			
			
			
			$withdrawalData = new Withdrawal();
			
			$request->validate([
			'withdraw_method' => 'required',
			'withdraw_amount' => 'required'
			]);
			
			if($request->withdraw_method == 'cash'){
				$request->validate([
				'payment_method' => 'required'
				]);
				$withdrawalData->payment_method = $request->payment_method;
				if($request->payment_method != 'office'){
					$request->validate([
					'account_number' => 'required'
					]);
					$withdrawalData->payment_method_details = $request->account_details;
				}
				$withdrawalData->withdrawal_status = 'pending';
				}elseif($request->withdraw_method == 'topup'){
				$withdrawalData->withdrawal_status = 'paid';
			}
			
			$withdrawalVat = (config('mlm.withdrawal_vat') / 100) * $request->withdraw_amount;
			$withdrawalInsurance = (config('mlm.withdrawal_insurance') / 100) * $request->withdraw_amount;
			
			
			
			$withdrawalCharge = $withdrawalVat + $withdrawalInsurance;
			$totalWithdrawalAmount = $request->withdraw_amount - $withdrawalCharge;
			
			$withdrawalData->user_id = Auth::user()->id;
			$withdrawalData->withdrawal_amount = $request->withdraw_amount;
			$withdrawalData->withdrawal_charge = $withdrawalCharge;
			$withdrawalData->vat_amount = $withdrawalVat;
			$withdrawalData->insurance_amount = $withdrawalInsurance;
			$withdrawalData->total_withdrawal_amount = $totalWithdrawalAmount;
			$withdrawalData->withdrawal_details = $request->withdraw_details;
			$withdrawalData->save();
			
			if($request->withdraw_method == 'topup'){
				TopupBalance::create([
				'user_id' => Auth::User()->id,
				'from_user_id' =>  Auth::User()->id,
				'topup_amount' => $totalWithdrawalAmount,
				'topup_type' => 'withdrawal',
				'topup_flow' => 'in',
				'topup_details' => 'You have received '.$totalWithdrawalAmount.' Tk TopUp from withdrawal '.$withdrawalData->id,
				'topup_generate_by' => Auth::User()->id,
				'topup_status' => 'active'
				]);
			}
			
			return response()->json([
			'status' => "success",
			'message' => "Your Withdrawal Is Successfully Submitted"
			]);
		}
		
		public function SingleWithdraw(Request $request)
		{
			$data = Withdrawal::find($request->id);
			$data['user_id'] = $this->getUsernameById($data->user_id);
			return response()->json($data);
		}
		
		public function WithdrawStatusChange(Request $request)
		{
			$data = Withdrawal::find($request->id);
			$data->withdrawal_status = $request->status;
			$data->withdrawal_details = $request->withdrawal_details;
			$data->save();
			return response()->json([
			'status' => 'success',
			'message' => 'Status Successfully Updated'
			]);
		}
		
	}
