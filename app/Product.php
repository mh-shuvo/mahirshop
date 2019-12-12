<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class Product extends Model
	{
		
		public $timestamps = true;
		
		use SoftDeletes;
		
		protected $fillable = [
        'category_id', 'brand_id', 'unit_id', 'user_id','product_name','product_code','product_des','product_base_price','product_discount_price','product_vat', 'product_point', 'product_image', 'product_featured', 'product_type', 'product_status',
		];
		
		protected $dates = ['deleted_at'];
		
		public function category()
		{
			return $this->belongsTo('App\Category');
		}
		
		public function brand()
		{
			return $this->belongsTo('App\Brand');
		}
		
		public function unit()
		{
			return $this->belongsTo('App\Unit');
		}
		
		public function getProductPriceAttribute()
		{
			if($this->product_discount_price && $this->product_discount_price > 0){
				return "{$this->product_discount_price}";
				}else{
				return "{$this->product_base_price}";
			}
		}

		public function ProductStock()
		{
			return $this->belongsTo('App\StockManager','product_id','id');
		}
		
	}
