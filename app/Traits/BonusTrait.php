<?php
	
	namespace App\Traits;
	
	use App\MemberBonus;
	use Illuminate\Support\Facades\Auth;
	
	trait BonusTrait
	{
		public function AvaliableBonusByUser(){
			return MemberBonus::where("user_id", Auth::User()->id)
			->selectRaw("(COALESCE(SUM(CASE WHEN `bonus_type` = 'achiever' THEN amount END), 0)) AS `achiever`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `bonus_type` = 'chairman_club' THEN amount END), 0)) AS `chairman_club`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `bonus_type` = 'nsm_royalty' THEN amount END), 0)) AS `nsm_royalty`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `bonus_type` = 'ed_royalty' THEN amount END), 0)) AS `ed_royalty`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `bonus_type` = 'stockist_royalty' THEN amount END), 0)) AS `stockist_royalty`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `bonus_type` = 'matching' THEN amount END), 0)) AS `matching`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `bonus_type` = 'mega_matching' THEN amount END), 0)) AS `mega_matching`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `bonus_type` = 'sponsor' THEN amount END), 0)) AS `sponsor`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `bonus_type` = 'stockist_sponsor' THEN amount END), 0)) AS `stockist_sponsor`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `bonus_type` = 'stockist' THEN amount END), 0)) AS `stockist`")
			->selectRaw("(COALESCE(SUM(amount), 0)) AS `total_bonus`")
			->first();
		}
	}										