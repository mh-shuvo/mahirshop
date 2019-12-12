<?php
	
	namespace App\Traits;
	use App\User;
	use Illuminate\Support\Facades\Auth;
	
	trait UserTrait
	{
		public function getUsernameById($id){
			$getCheck = User::select('username')->find($id);
			return $getCheck ? $getCheck['username'] : false;
		}
		
		public function getNIDCheck($nationalId){
			$getCheck = User::where('national_id',$nationalId)->first();
			return $getCheck ? $getCheck : false;
		}
		
		public function getPhoneCheck($phone){
			$getCheck = User::where('phone',$phone)->first();
			return $getCheck ? $getCheck : false;
		}
		
		public function getUsernameCheck($username){
			$getCheck = User::where('username',$username)->first();
			return $getCheck ? $getCheck : false;
		}
		
		public function getIdByUsername($username){
			$getCheck = User::where('username',$username)->select('id')->first();
			return $getCheck ? $getCheck['id'] : false;
		}
		
		public function getTxnPinCheck($txnPin){
			$getCheck = User::where('txn_pin',$txnPin)->find(Auth::User()->id);
			return $getCheck ? true : false;
		}
	}
	
