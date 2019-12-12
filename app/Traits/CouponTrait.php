<?php
	
	namespace App\Traits;
	
	use Illuminate\Support\Facades\Auth;
	use App\CuponCode;
	
	trait CouponTrait
	{
		public function AvaliableCuponByUser(){
			return CuponCode::where("user_id", Auth::User()->id)
			->selectRaw("(COALESCE(count(CASE WHEN `cupon_flow` = 'in' AND `cupon_check` IS NULL THEN id END), 0)) AS `available`")
			->selectRaw("(COALESCE(count(CASE WHEN `cupon_flow` = 'out' AND `cupon_check` IS NULL THEN id END), 0)) AS `transfer`")
			->selectRaw("(COALESCE(count(CASE WHEN `cupon_flow` = 'out' AND `cupon_check` IS NOT NULL THEN id END), 0)) AS `used`")
			->first();
		}
		
		public function getCheckCouponCode($cuponCode){
			$getCheck = CuponCode::where("user_id", Auth::User()->id)
			->where('cupon_code',$cuponCode)
			->where('cupon_flow','in')
			->where('cupon_check',null)
			->first();
			return $getCheck ? true : false;
		}
	}														