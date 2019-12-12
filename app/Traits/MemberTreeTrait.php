<?php
	
	namespace App\Traits;
	use App\User;
	use App\MemberTree;
	use Illuminate\Support\Facades\Auth;
	
	trait MemberTreeTrait
	{
		public function getPlacementCheck($placementId,$PlacementCol,$PlacementSide = null){
			$getCheck = MemberTree::where('user_id',$placementId)->where($PlacementCol,$PlacementSide)->first();
			return $getCheck ? true : false;
		}
	}			