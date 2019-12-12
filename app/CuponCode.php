<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class CuponCode extends Model
	{
		public $timestamps = true;
		
		use SoftDeletes;
		
		protected $fillable = [
        'user_id','from_user_id','cupon_code','cupon_amount','cupon_type','cupon_flow','cupon_details','cupon_status'
		];
		
		protected $dates = ['deleted_at'];
		
		public function User()
		{
			return $this->belongsTo('App\User');
		}
		
	}
