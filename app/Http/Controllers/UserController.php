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
			
			$request->validate([
            'sponsor_id' => 'required',
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'select_package' => 'required',
            'password' => ['required','min:8'],
            ]);
            
            $data['sponsor_id'] = $this->getIdByUsername($request->sponsor_id);
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['username'] = $request->username;
            $data['phone'] = $request->phone;
            $data['password'] = $request->password;
			
			
			if(Auth::user()->hasRole('user')){
				return response()->json([
				'status' => 'errors',
				'message' => 'Access Denied'
				],422);
				
			}
			
			if(!$this->getUsernameCheck($request->sponsor_id)){
				return response()->json([
				'status' => 'error',
				'message' => 'Sponsor Username Is Not Valid'
				],422);
			}
			
			if($this->getUsernameCheck($request->username)){
				return response()->json([
				'status' => 'errors',
				'message' => 'Username Already Exits'
				],422);
			}
			
			$getPackage = Package::where("package_type","signup")->find($request->select_package);
			
			if(!$getPackage){
				return response()->json([
				'status' => 'errors',
				'message' => 'Inactive Package. Please Try Again...'
				],422);
			}
			
			$newUser = new User();
			$newUser->name = $data['name'];
			$newUser->email = $data['email'];
			$newUser->username = $data['username'];
			$newUser->phone = $data['phone'];
			$newUser->register_by = Auth::User()->id;
			$newUser->user_type = 'user';
			$newUser->password = Hash::make($data['password']);
			$newUser->save();
			
			$newUser->assignRole('user');
			
			$newMemberTree = new MemberTree();
			$newMemberTree->user_id = $newUser->id;
			$newMemberTree->sponsor_id = $data['sponsor_id'];
			$newMemberTree->save();
			
			$sponsorBonusAmount = (config('mlm.sponsor_bonus_percentage') / 100) * $getPackage->package_value;
			
			$sponsorBonusData = new MemberBonus();
			$sponsorBonusData->bonus_type = 'sponsor';
			$sponsorBonusData->user_id = $newMemberTree->sponsor_id;
			$sponsorBonusData->amount = $sponsorBonusAmount;
			$sponsorBonusData->details = 'You have received '.$sponsorBonusAmount.' TK Sponsor Bonus from '.$newUser->username;
			$sponsorBonusData->save();
			
			if($getPackage->package_value >= config('mlm.bonus_start_from')){
				$generationBonusAmount = (config('mlm.gen_bonus_percentage') / 100) * $getPackage->package_value;
				$this->GenarationBonus($generationBonusAmount,$newMemberTree->sponsor_id);
			}
			
			return response()->json([
			'status' => 'success',
			'message' => 'Member Sign-up Successfully'
			]);
		}
		
		public function GenarationBonus($bonusAmount,$sponsorId,$count = 1){
			
			$currentLavel = $count;
			$currentLevelBonus = 0;
			
			if($count == 1){
				$currentLevelBonus = (config('mlm.lavel_1_gen_bonus_percentage') / 100) * $bonusAmount;
				}elseif($count == 2){
				$currentLevelBonus = (config('mlm.lavel_2_gen_bonus_percentage') / 100) * $bonusAmount;
				}elseif($count <= 20){
				$currentLevelBonus = (config('mlm.lavel_3_to_20_gen_bonus_percentage') / 100) * $bonusAmount;
				}else{
				return $count;
			}
			
			$generationBonusData = new MemberBonus();
			$generationBonusData->bonus_type = 'generation';
			$generationBonusData->user_id = $sponsorId;
			$generationBonusData->amount = $currentLevelBonus;
			$generationBonusData->details = 'You have received '.$currentLevelBonus.' TK Generation Bonus from '.$currentLavel.' Level ';
			$generationBonusData->save();
			
			$MemberTree = MemberTree::where("user_id",$sponsorId)->first();
			$count = $count + 1;
			if($MemberTree && $MemberTree->sponsor_id){
				$this->GenarationBonus($bonusAmount,$MemberTree->sponsor_id,$count);
			}
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
