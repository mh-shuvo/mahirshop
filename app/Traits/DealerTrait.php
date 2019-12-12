<?php
	namespace App\Traits;
	
	use App\MemberBonus;
	use App\Orders;
	use Illuminate\Support\Facades\Auth;
	
	trait DealerTrait
	{
		public function AvaliableDealerPointByUser(){
			$receivedStockist = MemberBonus::where("user_id", Auth::User()->id)
			->selectRaw("(COALESCE(SUM(CASE WHEN `bonus_type` = 'stockist' THEN bonus_pv END), 0)) AS `total_bonus_pv`")
			->first();
			
			$totalReceivedPV = $this->dealerPVCheck($receivedStockist->total_bonus_pv,config('mlm.dealer_bonus_pv'));
			
			$deliveredOrderPV = Orders::where("order_delivery_from_user_id", Auth::User()->id)
			->whereNull('is_dealer_order')
			->selectRaw("(COALESCE(SUM(CASE WHEN `order_delivery_status` = 'Delivered' THEN order_total_point END), 0)) AS `delivered_pv`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `order_delivery_status` = 'Pending' THEN order_total_point END), 0)) AS `pending_pv`")
			->selectRaw("(COALESCE(SUM(CASE WHEN `order_delivery_status` != 'Cancel' THEN order_total_point END), 0)) AS `total_pv`")
			->first();
			$availableStockist = $this->dealerPVCheck($deliveredOrderPV->delivered_pv,config('mlm.dealer_bonus_pv'));
			return ['received_stockist' => $totalReceivedPV, $deliveredOrderPV,'available_stockist' => $availableStockist,'new_stockist' => ($availableStockist - $totalReceivedPV)];
		}
		
		private function dealerPVCheck($value,$compareValue,$count = 0){
			if($value >= $compareValue){
				$count++;
				$compareValues = $compareValue * $count + $compareValue;
				if($value >= $compareValues){
					$count = $this->dealerPVCheck($value,$compareValue,$count);
				}
			}
			
			return $count;
		}
	}											