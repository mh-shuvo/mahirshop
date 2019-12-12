<?php
	
	namespace App\Traits;
	use App\User;
	use App\StockManager;
	use Illuminate\Support\Facades\Auth;
	
	trait StockTrait
	{
		public function getAvailableStockByUser($id = null,$productId){
			if(!$id){
				$id = Auth::User()->id;
			}
			$totalStockIn = StockManager::where('user_id',$id)->where('product_id',$productId)->where('stock_status','Delivered')->sum('product_qty');
			$totalStockOut = StockManager::where('delivery_user_id',$id)->where('product_id',$productId)->sum('product_qty');
			$totalStock = $totalStockIn - $totalStockOut;
			return ['available_stock' => $totalStock, 'stock_in' => $totalStockIn, 'stock_out' => $totalStockOut];
		}
	}
