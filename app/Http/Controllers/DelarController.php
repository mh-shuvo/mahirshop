<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use App\Dealer;
	use App\Role;
	use App\Districts;
	use App\Divisions;
	use App\Country;
	use App\Upazila;
	use App\User;
	use App\Traits\UserTrait;
	use Yajra\Datatables\Datatables;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\Auth;
	use App\TopupBalance;
	use App\Point;
	use App\Traits\MemberTreeTrait;
	use App\Traits\TopupTrait;
	use App\Traits\PointTrait;
	use App\MemberTree;
	use App\MemberBonus;
	use Illuminate\Support\Carbon;
	use Image;
	
	class DelarController extends Controller
	{
		
		use UserTrait;
		public function index()
		{
			$roles = Role::all();
			$districts = Districts::all();
			$divisions = Divisions::all();
			$countrys = Country::all();
			$upazilas = Upazila::orderBy('name')->get();
			return view('admin.delar.index',compact('roles','districts','divisions','countrys','upazilas'));
		}
		public function data()
		{
			$data = User::where('user_type','dealer');
			return Datatables::of($data)
			->addColumn('city',function($data){
				return $data->city? $data->City->name : '';
			})
			->addColumn('state',function($data){
				return $data->state? $data->State->name : '';
			})
			->addColumn('action',function($data){
				return '<div class="dropdown-info dropdown open">
				<button class="btn btn-sm btn-success dropdown-toggle waves-effect waves-light " type="button" id="dropdown-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
				<div class="dropdown-menu" aria-labelledby="dropdown-4" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
				<a class="dropdown-item waves-light waves-effect ViewMember" data-id="'.$data->id.'" href="javascript:void(0)">View</a>
				</div>
				</div>';
			})
			->toJSON();
		}
		public function topup()
		{
			return view('admin.delar.topup');
		}
		public function store(Request $request)
		{
			$request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'txn_pin' => 'required',
            'national_id' => 'required',
            'password' => ['required','min:8'],
			]);
			
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['username'] = $request->username;
            $data['phone'] = $request->phone;
            $data['address'] = $request->address;
            $data['city'] = $request->city;
            $data['state'] = $request->state;
            $data['country'] = $request->country;
            $data['post_code'] = $request->post_code;
            $data['user_txn_pin'] = $request->user_txn_pin;
            $data['national_id'] =$request->national_id;
            $data['password'] = $request->password;
			
			$data['father_name'] = $request->father_name;
            $data['mother_name'] = $request->mother_name;
            $data['nomine_name'] = $request->nomine_name;
            
            $data['profile_picture'] = null;
			if($request->hasFile('profile_picture')){
				$document = $request->file('profile_picture');
				$data['profile_picture'] = 'upload/user/'.$request->username. '.' . $document->getClientOriginalExtension();
				Image::make($document)->resize(300,200)->save(public_path($data['profile_picture']));
			}
			
			
			if(isset($request->sponsor_id)){
				$data['sponsor_id'] = $this->getIdByUsername($request->sponsor_id);
				if(!$this->getUsernameCheck($request->sponsor_id)){
					return response()->json([
					'status' => 'error',
					'message' => 'Sponsor Username Is Not Valid'
					],422);
				}
			}
			
			if($this->getPhoneCheck($data['phone'])){
				return response()->json([
				'status' => 'errors',
				'message' => 'Mobile Number Already Exits'
				],422);
			}
			
			if($this->getUsernameCheck($data['username'])){
				return response()->json([
				'status' => 'errors',
				'message' => 'Username Already Exits'
				],422);
			}
			
			if(!$this->getTxnPinCheck($request->txn_pin)){
				return response()->json([
				'status' => 'errors',
				'message' => 'Transaction Pin Is Not Correct. Please Try again'
				],422);
			}
			
			$newUser = new User();
			$newUser->name = $data['name'];
			$newUser->email = $data['email'];
			$newUser->username = $data['username'];
			$newUser->phone = $data['phone'];
			$newUser->address = $data['address'];
			$newUser->city = $data['city'];
			$newUser->state = $data['state'];
			$newUser->country = $data['country'];
			$newUser->post_code = $data['post_code'];
			$newUser->txn_pin = $data['user_txn_pin'];
			$newUser->national_id = $data['national_id'];
			$newUser->register_by = Auth::user()->id;
			$newUser->father_name = $data['father_name'];
			$newUser->mother_name = $data['mother_name'];
			$newUser->nomine_name = $data['nomine_name'];
			$newUser->user_type = $request->signup_type;
			$newUser->profile_picture = $data['profile_picture'];
			$newUser->password = Hash::make($data['password']);
			$newUser->save();
			
			$newUser->assignRole($request->signup_type);
			
			if($request->dealer_type == 'company'){
				$newUser->assignRole('accountant');
			}
			
			if($request->signup_type == 'dealer'){
				$newMemberTree = new MemberTree();
				$newMemberTree->sponsor_id = $data['sponsor_id'];
				$newMemberTree->user_id = $newUser->id;
				$newMemberTree->is_premium = Carbon::now();
				$newMemberTree->save();
				
				$newDealer = new Dealer();
				$newDealer->user_id= $newUser->id;
				$newDealer->dealer_type= $request->dealer_type;
				$newDealer->district_id= $request->city;
				$newDealer->division_id= $request->state;
				$newDealer->upazila_id= $request->upazila_id;
				$newDealer->dealer_union= $request->union;
				$newDealer->dealer_delivery_name= $request->name;
				$newDealer->dealer_delivery_country= $request->country;
				$newDealer->dealer_delivery_state= $request->state ;
				$newDealer->dealer_delivery_city= $request->city ;
				$newDealer->dealer_delivery_email =$request->email ;
				$newDealer->dealer_delivery_phone = $request->phone ;
				$newDealer->dealer_delivery_address = $request->address ;
				$newDealer->dealer_delivery_postcode = $request->post_code ;
				$newDealer->save();
			}
			
			new SendSmsController([$newUser->phone],'Welcome to Me Global Private Limited. Your '.$request->signup_type.' registration has been successfully and Username is : '.$newUser->username,'Sign-up');
			
			
			return response()->json([
			'status' => 'success',
			'message' => 'User Registration Successfully'
			]);
			}
		}
		