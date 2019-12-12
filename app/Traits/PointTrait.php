<?php
	
	namespace App\Traits;
	
	use App\Point;
	use Illuminate\Support\Facades\Auth;
	
	trait PointTrait
	{
		public function AvaliablePointByUser(){
			return Point::where("user_id", Auth::User()->id)
			->selectRaw("(COALESCE(SUM(CASE WHEN `point_flow` = 'in' THEN point_amount END), 0)) AS `point_in`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `point_flow` = 'out' THEN point_amount END), 0)) AS `point_out`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `point_flow` = 'in' THEN point_amount END), 0)) - (COALESCE(SUM(CASE WHEN `point_flow` = 'out' THEN point_amount END), 0)) AS `point_available`")
			->first();
		}
		
		public function AvaliablePointByUserId($userId){
			return Point::where("user_id", $userId)
			->selectRaw("(COALESCE(SUM(CASE WHEN `point_flow` = 'in' THEN point_amount END), 0)) AS `point_in`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `point_flow` = 'out' THEN point_amount END), 0)) AS `point_out`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `point_flow` = 'in' THEN point_amount END), 0)) - (COALESCE(SUM(CASE WHEN `point_flow` = 'out' THEN point_amount END), 0)) AS `point_available`")
			->first();
		}
		
	}								