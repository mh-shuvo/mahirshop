<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Yajra\Datatables\Datatables;
	use App\MemberTree;
	use App\User;
	use App\Dealer;
	use App\TopupBalance;
	use App\Traits\UserTrait;
	use App\Traits\TopupTrait;
	
	class TopUpController extends Controller
	{
		use TopupTrait,UserTrait;
		
		public function topup()
		{
			return view('admin.topup');
		}
		
		public function UserTopupTransfer(Request $request){
			
			$topupReport = $this->AvaliableTopupBalanceByUser();
            
            if( $topupReport->topup_avaliable < $request->transfer_amount){
                return response()->json([
                'status' => 'error',
                'message' => "You don't have sufficient TopUp balance for Transfer"
                ],422);
			}
			
			if(!$this->getUsernameCheck($request->username)){
				return response()->json([
				'status' => 'error',
				'message' => 'Username is not valid'
				],422);
			}
			
			$getTransferUserCheck = User::where('username',$request->username)->first();
			
			if(!Auth::user()->hasRole('admin') && $getTransferUserCheck->hasRole('dealer')){
                return response()->json([
                'status' => 'error',
                'message' => "You can't transfer TopUp balance to dealer"
                ],422);
			}
			
			TopupBalance::create([
			'user_id' => Auth::User()->id,
			'from_user_id' =>  $this->getIdByUsername($request->username),
			'topup_amount' => $request->transfer_amount,
			'topup_type' => 'user',
			'topup_flow' => 'out',
			'topup_details' => 'You have transfer '.$request->transfer_amount.' Tk TopUp balance to '.$request->username.' .',
			'topup_generate_by' => Auth::User()->id,
			'topup_status' => 'active'
			]);
			
			TopupBalance::create([
			'user_id' =>  $this->getIdByUsername($request->username),
			'from_user_id' => Auth::User()->id,
			'topup_amount' => $request->transfer_amount,
			'topup_type' => 'user',
			'topup_flow' => 'in',
			'topup_details' => 'You have received '.$request->transfer_amount.' Tk TopUp balance From '.Auth::User()->username.' .',
			'topup_generate_by' => Auth::User()->id,
			'topup_status' => 'active'
			]);
			
			if(Auth::user()->hasRole('dealer')){
				$memberData = MemberTree::where('user_id',Auth::User()->id)->first();
				
				
				$unionBonus = (config('mlm.dealer_union_bonus') / 100) * $request->transfer_amount;
				$upazilaBonus = (config('mlm.dealer_upazila_bonus') / 100) * $request->transfer_amount;
				$districtBonus = (config('mlm.dealer_district_bonus') / 100) * $request->transfer_amount;
				$companyBonus = (config('mlm.dealer_division_bonus') / 100) * $request->transfer_amount;
				$sponsorBonusAmount = (config('mlm.dealer_sponsor_bonus') / 100) * $request->transfer_amount;
				
				if($memberData->sponsor_id){
					$stockistSponsorBonusData = new MemberBonus();
					$stockistSponsorBonusData->bonus_type = 'stockist_sponsor';
					$stockistSponsorBonusData->user_id = $memberData->sponsor_id;
					$stockistSponsorBonusData->from_user_id = Auth::User()->id;
					$stockistSponsorBonusData->amount = $sponsorBonusAmount;
					$stockistSponsorBonusData->status = 'active';
					$stockistSponsorBonusData->details = 'You have received '.$sponsorBonusAmount.' TK Dealer Sponsor Bonus from '.Auth::User()->username.' dealer.';
					$stockistSponsorBonusData->save();
				}
				
				// $dealerData = Dealer::where('user_id',Auth::id())->first();
				
				// if($dealerData->dealer_type == 'union'){
					// $unionBonusData = new MemberBonus();
					// $unionBonusData->bonus_type = 'stockist';
					// $unionBonusData->user_id = Auth::id();
					// $unionBonusData->from_user_id = Auth::id();
					// $unionBonusData->amount = $unionBonus;
					// $unionBonusData->status = 'active';
					// $unionBonusData->details = 'You have received '.$unionBonus.' TK Dealer Bonus from '.Auth::User()->username.' dealer';
					// $unionBonusData->save();
					// $companyBonus = $companyBonus - $unionBonus;
				// }
				
				// if($dealerData->dealer_type == 'union' || $dealerData->dealer_type == 'upazila'){
					// $getUpazila = Dealer::where('upazila_id', $orderData->Dealer->upazila_id)->where('dealer_type','upazila')->first();
					// if($orderData->Dealer->upazila_id && $getUpazila){
						// $upazilaBonusData = new MemberBonus();
						// $upazilaBonusData->bonus_type = 'stockist';
						// $upazilaBonusData->user_id = $getUpazila->user_id;
						// $upazilaBonusData->from_user_id = $orderData->order_delivery_from_user_id;
						// $upazilaBonusData->amount = $upazilaBonus;
						// $upazilaBonusData->status = 'active';
						// $upazilaBonusData->details = 'You have received '.$upazilaBonus.' TK Dealer Bonus from '.Auth::User()->username.' dealer';
						// $upazilaBonusData->save();
						// $companyBonus = $companyBonus - $upazilaBonus;
					// }
				// }
				
				// if($orderData->Dealer->dealer_type == 'union' || $orderData->Dealer->dealer_type == 'upazila' || $orderData->Dealer->dealer_type == 'district'){
					// $getDistrict = Dealer::where('district_id',$orderData->Dealer->district_id)->where('dealer_type','district')->first();
					// if($orderData->Dealer->district_id && $getDistrict){
						// $districtBonusData = new MemberBonus();
						// $districtBonusData->bonus_type = 'stockist';
						// $districtBonusData->user_id = $getDistrict->user_id;
						// $districtBonusData->from_user_id = $orderData->order_delivery_from_user_id;
						// $districtBonusData->amount = $districtBonus;
						// $districtBonusData->status = 'active';
						// $districtBonusData->details = 'You have received '.$districtBonus.' TK Dealer Bonus from '.Auth::User()->username.' dealer';
						// $districtBonusData->save();
						// $companyBonus = $companyBonus - $districtBonus;
					// }
				// }
			}
			
			
			return response()->json([
			'status' => 'success',
			'message' => 'TopUp Transfer Successfully To '.$request->username
			]);
			
		}
		
		public function UserTopupList()
		{
			$data = TopupBalance::select('topup_amount','topup_flow','topup_details','created_at','topup_status')->where('user_id',Auth::user()->id);
			return Datatables::of($data)
			->order(function ($query) {
				$query->orderBy('id', 'desc');
			})
			->toJson();
		}
	}
