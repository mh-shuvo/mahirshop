<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	use Cog\Laravel\Optimus\Facades\Optimus;
	use Cog\Laravel\Optimus\Traits\OptimusEncodedRouteKey;
	
	class Orders extends Model
	{
		use OptimusEncodedRouteKey;
		
		public $timestamps = true;
		
		use SoftDeletes;
		
		protected $guarded = [];
		
		protected $dates = ['deleted_at'];
		
		protected $casts = [
		'created_at' => 'datetime:Y-m-d H:i:s A',
		];
		
		public function User()
		{
			return $this->belongsTo('App\User','user_id','id');
		}
		public function Stock()
		{
			return $this->belongsTo('App\StockManager','order_id','id');
		}
		
		public function Dealer()
		{
			return $this->belongsTo('App\Dealer','order_delivery_from_user_id','user_id');
		}
		
		public function UserDealer()
		{
			return $this->belongsTo('App\User','order_delivery_from_user_id','id');
		}
		
		public function getOrderNoAttribute()
		{
			return Optimus::connection('main')->encode($this->id);
		}
	}
