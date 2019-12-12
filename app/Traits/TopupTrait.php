<?php
	
	namespace App\Traits;
	
	use App\TopupBalance;
	use Illuminate\Support\Facades\Auth;
	
	trait TopupTrait
	{
		public function AvaliableTopupBalanceByUser(){
			return TopupBalance::where("user_id", Auth::User()->id)
			->selectRaw("(COALESCE(SUM(CASE WHEN `topup_flow` = 'in' THEN topup_amount END), 0)) AS `topup_in`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `topup_flow` = 'out' THEN topup_amount END), 0)) AS `topup_out`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `topup_flow` = 'in' THEN topup_amount END), 0)) - (COALESCE(SUM(CASE WHEN `topup_flow` = 'out' THEN topup_amount END), 0)) AS `topup_avaliable`")
			->first();
		}
		
	}		