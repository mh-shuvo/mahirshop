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
	use App\Designation;
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
			// $dailyBonusMembers = MemberTree::get();
			// foreach($dailyBonusMembers as $dailyBonusMember){
			// $totalAmount = TopupBalance::where("from_user_id", $dailyBonusMember->user_id)
			// ->selectRaw("(COALESCE(SUM(CASE WHEN `topup_flow` = 'out' AND `is_order` IS NOT NULL THEN topup_amount END), 0)) AS `topup_out`")
			// ->first();
			// $dailyBonusMember->package_value = $totalAmount->topup_out;
			// $dailyBonusMember->save();
			// }
			
			$packages = Package::where("package_type","signup")->get();
			return view('admin.new_member',compact('packages'));
		}
		
		private function matchingCount($value,$compareValue,$count = 0){
			if($value >= $compareValue){
				$count++;
				$compareValues = $compareValue * $count + $compareValue;
				if($value >= $compareValues){
					$count = $this->matchingCount($value,$compareValue,$count);
				}
			}
			
			return $count;
		}
		
		public function changePlacement(Request $request)
		{
			$request->id = $this->getIdByUsername($request->username);
			$request->placement_id = $this->getIdByUsername($request->placement_username);
			
			if($request->placement_position == 'A'){
				$request->placement_position = 'l_id';
				}elseif($request->placement_position == 'B'){
				$request->placement_position = 'r_id';
				}else{
				MemberTree::where('user_id', $request->placement_id)
				->update([
				'l_id' => null,
				'r_id' => null
				]);
				
				return response()->json([
				'status' => 'success',
				'message' => 'Member Placement Successfully'
				]);
			}
			
			if(!$this->getPlacementCheck($request->placement_id,$request->placement_position)){
				return response()->json([
				'status' => 'errors',
				'message' => 'Placement Position Is Not Available'
				],422);
			}
			
			MemberTree::where('user_id', $request->placement_id)
			->update([
            $request->placement_position => $request->id,
			]);
			
			return response()->json([
			'status' => 'success',
			'message' => 'Member Placement Successfully'
			]);
			
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
			$data['placement_id'] = $this->getIdByUsername($request->placement_username);
			$data['placement_position'] = $request->placement_position;
			
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
			
			if(!Auth::User()->is_signup_without_payment){
				if($this->AvaliableTopupBalanceByUser()->topup_avaliable < $getPackage->package_value){
					return response()->json([
					'status' => 'errors',
					'message' => 'TopUp balance not available for sign-up, you need more '.number_format($getPackage->package_value - $this->AvaliableTopupBalanceByUser()->topup_avaliable).' Tk'
					],422);
				}
			}
			
			if($data['placement_position'] == 'A'){
				$data['placement_position'] = 'l_id';
				}else{
				$data['placement_position'] = 'r_id';
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
			$newUser->register_by = Auth::User()->id;
			$newUser->user_type = 'user';
			$newUser->password = Hash::make($data['password']);
			$newUser->save();
			
			$newUser->assignRole('user');
			
			TopupBalance::create([
			'user_id' => Auth::User()->id,
			'from_user_id' =>  $newUser->id,
			'topup_amount' => $getPackage->package_value,
			'topup_type' => 'user',
			'is_order' => true,
			'topup_flow' => 'out',
			'topup_details' => 'You have new sign-up with '.$getPackage->package_value.' Tk For '.$newUser->username,
			'topup_generate_by' => Auth::User()->id,
			'topup_status' => 'active'
			]);
			
			$newMemberTree = new MemberTree();
			$newMemberTree->user_id = $newUser->id;
			$newMemberTree->sponsor_id = $data['sponsor_id'];
			
			$totalAmount = TopupBalance::where("from_user_id", $newUser->id)
			->selectRaw("(COALESCE(SUM(CASE WHEN `topup_flow` = 'out' AND `is_order` IS NOT NULL THEN topup_amount END), 0)) AS `package_topup`")
			->first();
			
			if($totalAmount->package_topup >= config('mlm.premium_package_value')){
				$newMemberTree->is_premium = Carbon::now();
			}
			
			if($totalAmount->package_topup >= config('mlm.matching_start_from')){
				$newMemberTree->is_valid = Carbon::now();
			}
			
			if(config('mlm.renew_purchase_value') <= $getPackage->package_value){
				$newMemberTree->is_renewed = Carbon::now()->add(1, 'month');
			}
			$newMemberTree->package_value = $totalAmount->package_topup;
			$newMemberTree->save();
			
			MemberTree::where('user_id', $data['placement_id'])
			->update([
            $data['placement_position'] => $newUser->id,
			]);
			
			$this->sponsorBonus($getPackage,$newMemberTree);
			$this->DailyIncomeUpdate($getPackage,$newUser);
			$this->rankAndClubUpdate($data['sponsor_id']);
			
			return response()->json([
			'status' => 'success',
			'message' => 'Member Sign-up Successfully'
			]);
		}
		
		public function upgrade(Request $request)
		{
			$request->validate([
			'package_id' => 'required',
			]);
			
			$getPackage = Package::where("package_type","upgrade")->find($request->package_id);
			if(!$getPackage){
				return response()->json([
				'status' => 'errors',
				'message' => 'Inactive Package. Please Try Again...'
				],422);
			}
			
			if($this->AvaliableTopupBalanceByUser()->topup_avaliable < $getPackage->package_value){
				return response()->json([
				'status' => 'errors',
				'message' => 'TopUp balance not available for upgrade, you need more '.number_format($getPackage->package_value - $this->AvaliableTopupBalanceByUser()->topup_avaliable).' Tk'
				],422);
			}
			
			$getMember = MemberTree::where("user_id", Auth::id())->first();
			
			if ($getMember->is_premium) {
				return response()->json([
				'status' => 'error',
				'message' => 'You have already Upgraded.'
				],422);
			}
			
			TopupBalance::create([
			'user_id' => Auth::User()->id,
			'from_user_id' =>  $getMember->user_id,
			'topup_amount' => $getPackage->package_value,
			'topup_type' => 'user',
			'is_order' => true,
			'topup_flow' => 'out',
			'topup_details' => 'You have upgrade your account with '.$getPackage->package_value.' Tk',
			'topup_generate_by' => Auth::User()->id,
			'topup_status' => 'active'
			]);
			
			$totalAmount = TopupBalance::where("from_user_id", $getMember->user_id)
			->selectRaw("(COALESCE(SUM(CASE WHEN `topup_flow` = 'out' AND `is_order` IS NOT NULL THEN topup_amount END), 0)) AS `package_topup`")
			->first();
			
			if($totalAmount->package_topup >= config('mlm.matching_start_from')){
				$getMember->is_valid = Carbon::now();
				
			}
			
			if($totalAmount->package_topup >= config('mlm.premium_package_value')){
				$getMember->is_premium = Carbon::now();
				
			}
			$getMember->package_value = $totalAmount->package_topup;
			$getMember->save();
			
			$this->sponsorBonus($getPackage,$getMember);
			$this->DailyIncomeUpdate($getPackage,Auth::User());
			$this->rankAndClubUpdate($getMember->sponsor_id);
			
			return response()->json([
			'status' => 'success',
			'package_name' => $getPackage->title,
			'message' => 'Your account successfully upgraded'
			]);
		}
		
		public function renew(Request $request){
			$request->validate([
			'package_id' => 'required',
			]);
			
			$getPackage = Package::where("package_type","renew")->find($request->package_id);
			if(!$getPackage){
				return response()->json([
				'status' => 'errors',
				'message' => 'Inactive Package. Please Try Again...'
				],422);
			}
			
			if($this->AvaliableTopupBalanceByUser()->topup_avaliable < $getPackage->package_value){
				return response()->json([
				'status' => 'errors',
				'message' => 'TopUp balance not available for re-purchase, you need more '.number_format($getPackage->package_value - $this->AvaliableTopupBalanceByUser()->topup_avaliable).' Tk'
				],422);
			}
			
			TopupBalance::create([
			'user_id' => Auth::User()->id,
			'from_user_id' =>  Auth::User()->id,
			'topup_amount' => $getPackage->package_value,
			'topup_type' => 'user',
			'is_order' => null,
			'is_renew' => true,
			'topup_flow' => 'out',
			'topup_details' => 'You have re-purchase your account with '.$getPackage->package_value.' Tk',
			'topup_generate_by' => Auth::User()->id,
			'topup_status' => 'active'
			]);
			
			$getMember = MemberTree::where("user_id", Auth::id())->first();
			if(config('mlm.renew_purchase_value') <= $getPackage->package_value){
				$getMember->is_renewed = Carbon::now()->add(1, 'month');
				$getMember->save();
			}
			
			
			$generationBonusAmount = (config('mlm.gen_bonus_percentage') / 100) * $getPackage->package_value;
			$this->GenarationBonus($generationBonusAmount,$getMember->sponsor_id);
			$this->DailyIncomeUpdate($getPackage,Auth::User());
			
			return response([
			'status' => 'success',
			'message' => 'Your have Re-purchase successfully'
			]);
		}
		
		public function sponsorBonus($getPackage,$memberTree){
			$sponsorBonusAmount = (config('mlm.sponsor_bonus_percentage') / 100) * $getPackage->package_value;
			$sponsorBonusData = new MemberBonus();
			$sponsorBonusData->bonus_type = 'sponsor';
			$sponsorBonusData->user_id = $memberTree->sponsor_id;
			$sponsorBonusData->amount = $sponsorBonusAmount;
			$sponsorBonusData->details = 'You have received '.$sponsorBonusAmount.' TK Sponsor Bonus from '.$memberTree->Users->username;
			$sponsorBonusData->save();
		}
		
		public function rankAndClubUpdate($sponsorId){
			if($sponsorId){
				$sponsorMemberTree = MemberTree::where("user_id", $sponsorId)->first();
				$referralCount = MemberTree::whereNotNull('is_premium')->where("sponsor_id", $sponsorMemberTree->user_id)->count();
				if(!$sponsorMemberTree->designation){
					if(config('mlm.first_rank_referral') <= $referralCount){
						$sponsorMemberTree->designation = 'sr';
						$sponsorMemberTree->save();
						
						$designationData = new Designation();
						$designationData->user_id = $sponsorId;
						$designationData->designation_title = config('mlm.incentives.plan0.title');
						$designationData->designation_name = config('mlm.incentives.plan0.name');
						$designationData->status = 'active';
						$designationData->save();
					}
				}
				
				if($sponsorMemberTree->designation){
					if(config('mlm.club_entry_referral') <= $referralCount){
						$this->firstBoardEntry($sponsorMemberTree->user_id);
					}
				}
			}
		}
		
		public function DailyIncomeUpdate($getPackage,$newUser){
			if($getPackage->package_value >= config('mlm.bonus_start_from')){
				$checkMemberPackage = MemberTree::where("is_renewed",">=",Carbon::now())
				->selectRaw("(COALESCE(count(CASE WHEN `package_value` <= '200' THEN id END), 0)) AS `package_200`")
				->selectRaw("(COALESCE(count(CASE WHEN `package_value` <= '500' AND `package_value` > '200' THEN id END), 0)) AS `package_500`")
				->selectRaw("(COALESCE(count(CASE WHEN `package_value` <= '1600' AND `package_value` > '500' THEN id END), 0)) AS `package_1600`")
				->selectRaw("(COALESCE(count(CASE WHEN `package_value` <= '3000' AND `package_value` > '1600' THEN id END), 0)) AS `package_3000`")
				->first();
				
				$dailyBonusMembers = MemberTree::where("is_renewed",">=",Carbon::now())->get();
				
				$dailyCashBack = (config('mlm.daily_cash_back_percentage') / 100) * $getPackage->package_value;
				
				$dailyCashBackAmountP200 = 0;
				$dailyCashBackAmountP500 = 0;
				$dailyCashBackAmountP1600 = 0;
				$dailyCashBackAmountP3000 = 0;
				
				if($checkMemberPackage->package_200 > 0){
					$dailyCashBackAmountP200 = ((10 / 100) * $dailyCashBack) / $checkMemberPackage->package_200;
				}
				if($checkMemberPackage->package_500 > 0){
					$dailyCashBackAmountP500 = ((15 / 100) * $dailyCashBack) / $checkMemberPackage->package_500;
				}
				if($checkMemberPackage->package_1600 > 0){
					$dailyCashBackAmountP1600 = ((25 / 100) * $dailyCashBack) / $checkMemberPackage->package_1600;
				}
				if($checkMemberPackage->package_3000 > 0){
					$dailyCashBackAmountP3000 = ((50 / 100) * $dailyCashBack) / $checkMemberPackage->package_3000;
				}
				
				if($dailyBonusMembers){
					foreach($dailyBonusMembers as $dailyBonusMember){
						$dailyCashBackAmount = 0;
						if($dailyCashBack > 0){
							if($dailyBonusMember->package_value >= '3000'){
								$dailyCashBackAmount = $dailyCashBackAmountP3000;
								}elseif($dailyBonusMember->package_value >= '1600'){
								$dailyCashBackAmount = $dailyCashBackAmountP1600;
								}elseif($dailyBonusMember->package_value >= '500'){
								$dailyCashBackAmount = $dailyCashBackAmountP500;
								}elseif($dailyBonusMember->package_value >= '200'){
								$dailyCashBackAmount = $dailyCashBackAmountP200;
							}
							
							if($dailyCashBackAmount > 0){
								$dailyCashBackBonusData = new MemberBonus();
								$dailyCashBackBonusData->bonus_type = 'daily_cash_back';
								$dailyCashBackBonusData->user_id = $dailyBonusMember->user_id;
								$dailyCashBackBonusData->amount = $dailyCashBackAmount;
								$dailyCashBackBonusData->details = 'You have received '.number_format($dailyCashBackAmount, 2).' TK Daily Cash Back Bonus from '.$newUser->username;
								$dailyCashBackBonusData->save();
							}
						}
					}
				}
			}
		}
		
		public function BoardUpdate($board = 0){
			$currentBoard = BoardPlan::where("board_no", $board)->first();
			$currentboardMember = BoardPlan::where("board_user_id",$currentBoard->user_id)->where("board_no", $board)->count();
			
			if($currentboardMember >= 10){
				$currentBoard->board_no = $currentBoard->board_no + 1;
				$currentBoard->save();
				
				if($board != 6){
					$this->BoardUpdate($currentBoard->board_no);
				}
			}
		}
		
		public function firstBoardEntry($userId){
			$currentUser = BoardPlan::where("board_no", 0)->first();
			$currentboardMember = BoardPlan::where("board_user_id",$currentUser->user_id)->where("board_no", 0)->count();
			if($currentboardMember < 10){
				$newBoardMember = new BoardPlan();
				$newBoardMember->user_id = $userId;
				$newBoardMember->board_user_id = $currentUser->user_id;
				$newBoardMember->board_no = 0;
				$newBoardMember->save();
				$this->BoardUpdate();
				}else{
				$this->BoardUpdate();
				$this->firstBoardEntry($userId);
			}
			return;
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
