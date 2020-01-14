<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Hash;
	use Yajra\Datatables\Datatables;
	use App\Country;
	use App\Districts;
	use App\Divisions;
	use App\User;
	use App\TopupBalance;
	use App\MemberTree;
	use App\Orders;
	use App\Traits\UserTrait;
	use App\Traits\MemberTreeTrait;
	use App\Traits\TopupTrait;
	use App\Traits\PointTrait;
	use App\Traits\BonusTrait;
	use App\Traits\IncomeTrait;
	use Illuminate\Support\Facades\Auth;
	use App\StockManager;
	use App\Withdrawal;
	use Spatie\Permission\Models\Role;
	use PDF;
	use Image;
	
	class AdminController extends Controller
	{
		use UserTrait,TopupTrait,PointTrait,MemberTreeTrait,BonusTrait,IncomeTrait;
		
		public function __construct()
		{
			$this->middleware('auth');
		}
		
		public function index()
		{
			// User::find('4')->assignRole('user');
			$totalPoint = $this->AvaliablePointByUser();
			$totalTopup = $this->AvaliableTopupBalanceByUser();
			$totalBonus = $this->AvaliableBonusByUser();
			$withdrawal = $this->AvailableBalanceByUser();
			
			$memberTree = MemberTree::where('user_id', Auth::user()->id)->first();
			$extraData = json_decode($memberTree->extra_data,true);
			
			return view('admin.index',compact('memberTree','extraData','totalPoint','totalTopup','totalBonus','withdrawal'));
		}
		public function idCard()
		{
			return view('admin.id_card');
		}
		public function Withdrow(){
			return view('admin.withdrow');
		}
		
		public function countryOffer()
		{
			return view('admin.country_offer');
		}
		public function refardReward()
		{
			return view('admin.refered_reward_achiver');
		}
		public function memberDailyEarn()
		{
			return view('admin.member_daily_earn');
		}
		public function notice()
		{
			return view('admin.notice');
		}
		public function message()
		{
			return view('admin.message');
		}
		public function vendors()
		{
			return view('admin.vendors');
		}
		public function paynow()
		{
			return view('admin.pay_now');
		}
		public function myTeam()
		{
			return view('admin.team');
		}
		public function MyTeamList(Request $request){
			
			
			if($request->id == 'null'){
				$id = Auth::user()->id;
				}else{
				$id = $this->getIdByUsername($request->id);
				if(!$id){
					return response()->json([
					"status" => "error"
					],422);
				}
				
				if($id && $id <= Auth::user()->id){
					$id = Auth::user()->id;
				}
			}
			
			$gen1Datas = MemberTree::select('user_id','is_premium')->where('sponsor_id',$id)->with(['Users:id,name,username,phone','Sponsor:id,username'])->get();
			$gen2Datas = [];
			$totalgen2 = 0;
			$totalgen1 = count($gen1Datas);
			foreach($gen1Datas as $gen1Data){
				$get2alldata = MemberTree::select('user_id','is_premium')->where('sponsor_id',$gen1Data->user_id)->with(['Users:id,name,username,phone','Sponsor:id,username'])->get();
				$gen2Datas[] = $get2alldata;
				$totalgen2 += count($get2alldata);
			}
			
			return response()->json([
			"status" => "success",
			"total_gen_1" => $totalgen1,
			"total_gen_2" => $totalgen2,
			"gen_1_data" => $gen1Datas,
			"gen_2_data" => $gen2Datas
			]);
		}
        public function SearchTeam($id)
        {   
			return $this->getIdByUsername($id);
		}
        
        public function NewTopupBalance(Request $request)
		{
			
			$request['user_id'] = Auth::user()->id;
			$request['topup_amount'] = 1000;
			$request['topup_type'] = 'admin';
			$request['topup_details'] = 'You Received TopUp Balance From System Administrator';
			
			$this->NewTopup($request);
			
			return response()->json([
			'message' => 'Topup Successfully'
			]);
			
		}
        
        private function NewTopup($data){
			return TopupBalance::create([
			'user_id' =>  $data['user_id'],
			'from_user_id' => Auth::User()->id,
			'topup_amount' => $data['topup_amount'],
			'topup_type' => $data['topup_type'],
			'topup_flow' => 'in',
			'topup_details' => $data['topup_details'],
			'topup_generate_by' => Auth::User()->id,
			'topup_status' => 'active'
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
		public function profile()
		{
			$countrys = Country::all();
			$districts  = Districts::all();
			$divisions = Divisions::all();
			return view('admin.profile',compact('countrys','districts','divisions'));
		}
		/*User Profile Password, Transaction Password Update*/
		public function updateProfile (Request $request) {
			
			$user = Auth::user();
			if($request->hasFile('profile_picture')){
				
				$old_img = public_path($user->username);
				if (file_exists($old_img)) {
					@unlink($old_img);
				}
				
				$document = $request->file('profile_picture');
				$image = $user->username. '.' . $document->getClientOriginalExtension();
				Image::make($document)->resize(300,300)->save(public_path('upload/user/'.($image)));
			}
			else{
				$image = $user->profile_picture;
			}
			$user-> address 	= $request-> address;
			$user-> country 	= $request-> country;
			$user-> state 		= $request-> state;
			$user-> city 		= $request-> city;
			$user-> post_code 	= $request-> post_code;
			$user-> profile_picture = $image;
			$user->save();
			
			return response()->json([
			'message' => "Profile Successfully Updated"
			]);
			
		}
		public function updatePassword (Request $request) {
			
			$request->validate([
			'old_password' => 'required',
			'password' => 'required|string|min:8',
			]);
			
			if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
				return response()->json([
				'status' => "error",
				'message' => "Current password does not match"
				],422);
			}
			
			if($request->password != $request->renew_password){
				return response()->json([
				'status' => "error",
				'message' => "New password and Confirm password does not match"
				],422);
			}
			
			//Change Password
			$user = Auth::user();
			$user->password = Hash::make($request->get('password'));
			$user->save();
			
			return response()->json([
			'status' => "success",
			'message' => "Password Successfully Updated"
			]);
		}
		
		public function updateTxnPassword (Request $request) {
			
			$request->validate([
			'current_pin' => 'required',
			'txn_pin' => 'required|string|min:6',
			]);
			
			if(!$this->getTxnPinCheck($request->current_pin)){
				return response()->json([
				'status' => 'errors',
				'message' => 'Current Transaction Pin Is Not Correct. Please Try again'
				],422);
			}
			
			if($request->txn_pin != $request->renew_pin){
				return response()->json([
				'status' => "error",
				'message' => "New Pin and Confirm Pin does not match"
				],422);
			}
			
			//Change Password
			$user = Auth::user();
			$user->txn_pin = $request->txn_pin;
			$user->save();
			
			return response()->json([
			'status' => "success",
			'message' => "Transaction Pin Successfully Updated"
			]);
		}
		
		/*public function withdrawData()
			{
			$data = Withdrawal::all();
			
			return Datatables::of($data)
			->addColumn('action',function($data){
			return '<a href="javascript:vodi(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm">Edit</a>
			<a href="javascript:void(0)" class="btn btn-danger btn-sm categoryDelete" data-id="'.$data->id.'"">Delete</a>';
			})
			->toJson();
		}*/
		
		
		public function withdrawData()
		{
			$data = Withdrawal::where('user_id',Auth::user()->id)->get();
			
			return Datatables::of($data)
			->addColumn('action',function($data){
				return '<a href="javascript:vodi(0)" data-id="'.$data->id.'" class="btn btn-info btn-sm">Edit</a>
				<a href="javascript:void(0)" class="btn btn-danger btn-sm categoryDelete" data-id="'.$data->id.'"">Delete</a>';
			})
			->toJson();
			
		}
		
		public function withdrawSubmit(Request $request)
		{
			
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
			'payment_method' => 'required',
			'withdraw_amount' => 'required'
			]);
			
			if($request->payment_method != 'office'){
				$request->validate([
				'account_number' => 'required'
				]);
				$withdrawalData->withdrawal_account_no = $request->account_number;
				$withdrawalData->payment_method_details = $request->account_details;
			}
			
			
			$withdrawalVat = (config('mlm.withdrawal_vat') / 100) * $request->withdraw_amount;
			$withdrawalCharge = (config('mlm.withdrawal_charge') / 100) * $request->withdraw_amount;
			
			
			
			$withdrawalChargeTotal = $withdrawalVat + $withdrawalCharge;
			$totalWithdrawalAmount = $request->withdraw_amount - $withdrawalChargeTotal;
			
			$withdrawalData->user_id = Auth::user()->id;
			$withdrawalData->withdrawal_amount = $request->withdraw_amount;
			$withdrawalData->withdrawal_charge = $withdrawalChargeTotal;
			$withdrawalData->vat_amount = $withdrawalVat;
			$withdrawalData->total_withdrawal_amount = $totalWithdrawalAmount;
			$withdrawalData->withdrawal_details = $request->withdraw_details;
			$withdrawalData->payment_method = $request->payment_method;
			$withdrawalData->withdrawal_status = 'pending';
			$withdrawalData->save();
			
			return response()->json([
			'status' => "success",
			'message' => "Your Withdrawal Is Successfully Submitted"
			]);
		}
		
		public function order()
		{
			return view('admin.order');
		}
		public function orderData()
		{
			// if(Auth::user()->user_type == 'dealer'){
			// $data = Orders::where('order_delivery_from_user_id',Auth::user()->id);
			// }	
			// else{
			$data = Orders::where('user_id',Auth::user()->id);
			// }
			
			return Datatables::of($data)
			->addColumn('id',function($data){
				return $data->getRouteKey();
			})
			->addColumn('order_delivery_type',function($data){
				return $data->order_delivery_type=='cod' ? 'Cash On Delivery' : 'Self';
			})
			->addColumn('action',function($data){
				
				return '<a href="'.url("/admin/order/single/".$data->id).'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>';
			})
			->toJSON();
		}
		public function orderSingle($id)
		{
			$order = Orders::find($id);
			$products = StockManager::where('order_id',$id)->get();
			return view('admin.order_view',compact('order','products'));
		}
		
		public function OrderPrint($id)
		{
			$order = Orders::find($id);
			$products = StockManager::where('order_id',$id)->get();
			// $pdf = PDF::loadView('admin.order-print',compact('order','products'));  
			// return $pdf->download('medium.pdf');
			return view('admin.order-print',compact('order','products'));
		}
		
	}
