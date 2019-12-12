<?php
	
	namespace App\Traits;
	
	use App\MemberBonus;
	use App\Withdrawal;
	use Illuminate\Support\Facades\Auth;
	
	trait IncomeTrait
	{
		public function AvailableBalanceByUser(){
			$withdrawalUser = Withdrawal::where("user_id", Auth::User()->id)
			->selectRaw("(COALESCE(SUM(CASE WHEN `withdrawal_status` != 'cancel' THEN withdrawal_amount END), 0)) AS `withdrawal`")
			->first();
			
			$memberBonus = MemberBonus::where("user_id", Auth::User()->id)
			->selectRaw("(COALESCE(SUM(amount), 0)) AS `total_bonus`")
			->first();
			
			$memberBonus['current_balance'] = $memberBonus->total_bonus - $withdrawalUser->withdrawal;
			$memberBonus['withdrawal_amount'] = $withdrawalUser->withdrawal;
			return $memberBonus;
		}
	}												