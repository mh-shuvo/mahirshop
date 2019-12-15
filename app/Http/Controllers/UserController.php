<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use App\Package;
	use App\Country;
	use App\Districts;
	use App\Divisions;
	use App\Traits\UserTrait;
	use App\TopupBalance;
	use App\Point;
	use App\Traits\MemberTreeTrait;
	use App\Traits\TopupTrait;
	use App\Traits\PointTrait;
	use App\User;
	use App\MemberTree;
	use App\BoardPlan;
	use App\MemberBonus;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Carbon;
	use Image;
	
	
	class UserController extends Controller
	{
		
		use UserTrait,MemberTreeTrait,TopupTrait,PointTrait;
		
		public function CreateMember()
		{
			$packages = Package::where("package_type","signup")->get();
			return view('admin.new_member',compact('packages'));
		}
		
		public function StoreMember(Request $request)
		{
			
			
			
			// $request->validate([
            // 'sponsor_id' => 'required',
            // 'name' => 'required',
            // 'username' => 'required',
            // 'phone' => 'required',
            // 'user_txn_pin' => 'required',
            // 'password' => ['required','min:8'],
            // ]);
            
            $data['sponsor_id'] = $this->getIdByUsername($request->sponsor_id);
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['username'] = $request->username;
            $data['phone'] = $request->phone;
            $data['user_txn_pin'] = $request->user_txn_pin;
            $data['password'] = $request->password;
			
			return BoardPlan::where("board_user_id",$data['sponsor_id'])->count();
			
			if(!Auth::User()->is_signup_without_payment){
				if($this->AvaliableTopupBalanceByUser()->topup_avaliable < config('mlm.registration_charge')){
					return response()->json([
					'status' => 'errors',
					'message' => 'TopUp balance not available, you need more '.number_format(config('mlm.registration_charge') - $this->AvaliableTopupBalanceByUser()->topup_avaliable).' Tk'
					],422);
				}
			}
			
			if(!$this->getUsernameCheck($request->sponsor_id)){
				return response()->json([
				'status' => 'error',
				'message' => 'Sponsor Username Is Not Valid'
				],422);
			}
			
			if($this->getPhoneCheck($request->phone)){
				return response()->json([
				'status' => 'errors',
				'message' => 'Mobile Number Already Exits'
				],422);
			}
			
			if($this->getUsernameCheck($request->username)){
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
			
			if(!$this->getPlacementCheck($data['placement_id'],$data['placement_position'])){
				return response()->json([
				'status' => 'errors',
				'message' => 'Placement Position Is Not Available'
				],422);
			}
			
			$newUser = new User();
			$newUser->name = $data['name'];
			$newUser->email = $data['email'];
			$newUser->username = $data['username'];
			$newUser->phone = $data['phone'];
			$newUser->txn_pin = $data['user_txn_pin'];
			$newUser->register_by = Auth::User()->id;
			$newUser->user_type = 'user';
			$newUser->password = Hash::make($data['password']);
			$newUser->save();
			
			$newUser->assignRole('user');
			
			$newMemberTree = new MemberTree();
			$newMemberTree->user_id = $newUser->id;
			$newMemberTree->sponsor_id = $data['sponsor_id'];
			$newMemberTree->save();
			
			
			
			if(!Auth::User()->is_signup_without_payment){
				TopupBalance::create([
				'user_id' => Auth::User()->id,
				'from_user_id' =>  $newUser->id,
				'topup_amount' => config('mlm.registration_charge'),
				'topup_type' => 'user',
				'topup_flow' => 'out',
				'topup_details' => 'Office Charge '.config('mlm.registration_charge').' Tk For '.$newUser->username.' Membership ID Card.',
				'topup_generate_by' => Auth::User()->id,
				'topup_status' => 'active'
				]);
				}else{
				$newSignup = Auth::User()->is_signup_without_payment;
				if($newSignup == 1){
					$newSignup = null;
					}else{
					$newSignup = $newSignup - 1;
				}
				$newUserSignupUpdate = Auth::User();
				$newUserSignupUpdate->is_signup_without_payment = $newSignup;
				$newUserSignupUpdate->save();
			}
			
			new SendSmsController([$newUser->phone],'Welcome to Me Global Marketing Private Limited. Your registration has been successfully and Username is : '.$newUser->username,'Sign-up');
			
			
			return response()->json([
			'status' => 'success',
			'message' => 'Member Registration Successfully'
			]);
		}
		
		public function generateIds(Request $request)
		{
			return;
			for($i=-100; $i<0; $i++){
				echo abs($i).'<br>';
				$newUser = new User();
				$newUser->name = 'ME Global';
				$newUser->email = 'mecosmeticspvtltd@gmail.com';
				$newUser->username = 'meglobal0'.abs($i);
				$newUser->phone = '000000'.abs($i);
				$newUser->address = 'Rajshahi';
				$newUser->city = 24;
				$newUser->state = 5;
				$newUser->country = 18;
				$newUser->post_code = '6000';
				$newUser->txn_pin = '123456';
				$newUser->national_id = '123456789100'.abs($i);
				$newUser->register_by = '1';
				$newUser->user_type = 'user';
				$newUser->profile_picture = null;
				
				$newUser->password = Hash::make('mepass'.abs($i));
				$newUser->save();
				
				$newUser->assignRole('user');
				
				$newMemberTree = new MemberTree();
				$newMemberTree->user_id = $newUser->id;
				$newMemberTree->sponsor_id = 1;
				$newMemberTree->save();
				
				MemberTree::where('user_id', ($newUser->id - 1))
				->update([
				'r_id' => $newUser->id,
				]);
				
			}
			return;
		}
		
		public function UpdateMember(Request $request){
			
			$data = User::find($request->user_id);
			
			$profile_picture = $data->profile_picture;
			
			if($request->hasFile('profile_picture')){
				$old_img = public_path('upload/user/'.$data->profile_picture);
				if (file_exists($old_img)) {
					@unlink($old_img);
				}
				$document = $request->file('profile_picture');
				$profile_picture= $data->username. '.' . $document->getClientOriginalExtension();
				Image::make($document)->resize(300,200)->save(public_path('upload/user/'.$profile_picture));
			}
			$data->name = $request->name;
			$data->email = $request->email;
			$data->phone = $request->phone;
			$data->address = $request->address;
			$data->city = $request->city;
			$data->state = $request->state;
			$data->country = $request->country;
			$data->post_code = $request->post_code;
			$data->profile_picture = $request->profile_picture;
			
			if(!empty($request->password)){
				$data->txn_pin = $request->user_txn_pin;
			}
			$data->national_id = $request->national_id;
			$data->register_by = $request->national_id;
			$data->father_name = $request->father_name;
			$data->mother_name = $request->mother_name;
			$data->nomine_name = $request->nomine_name;
			
			if($request->user_type == 'admin' ||  $request->user_type == 'accountant' || $request->user_type == 'manager'){
				$data ->user_type = $request ->user_type ;
				$data ->upazila = $request ->upazila;
				$data ->user_union = $request ->user_union;
			}
			else{
				$data->user_type = 'user';
			}
			
			$data->profile_picture = $profile_picture;
			if(!empty($request->password)){
				$data->password = Hash::make($request->password);
			}
			
			$data->save();
			return response()->json([
			'status' => 'success',
			'message' => 'Member Updated Successfully'
			]);
		}
		
	}
