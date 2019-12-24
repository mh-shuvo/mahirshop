<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Yajra\Datatables\Datatables;
	use App\MemberTree;
	use App\User;
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
                'status' => 'errors',
                'message' => "You don't have sufficient TopUp balance for Transfer"
                ],422);
			}
            
            if(MemberTree::where('user_id',Auth::User()->id)->first()->is_premium == null){
				return response()->json([
				'status' => 'errors',
				'message' => "You can't transfer TopUp balance without upgrade to premium"
				],422);
			}
			
			if(!$this->getUsernameCheck($request->username)){
				return response()->json([
				'status' => 'error',
				'message' => 'Username is not valid'
				],422);
			}
			
			if(!Auth::user()->hasRole('accountant') && Auth::user()->hasRole('dealer')){
				
				$OrderAmount = Orders::where("order_delivery_from_user_id", Auth::User()->id)
				->whereNull('is_dealer_order')
				->sum("order_net_amount")
				->first();
				
				return response()->json([
				'status' => 'errors',
				'message' => 'Your transfer exceeds the maximum amount allowed'
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
				