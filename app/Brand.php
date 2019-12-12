<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class Brand extends Model
	{
		public $timestamps = true;
		use SoftDeletes;
		
		protected $fillable = [
        'user_id', 'brand_name', 'brand_sort', 'brand_status',
		];
		
		protected $dates = ['deleted_at'];
		
		public function product()
		{
			return $this->hasMany('App\Product');
		}
	}
