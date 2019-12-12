<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class Category extends Model
	{
		
		public $timestamps = true;
		use SoftDeletes;

		protected $fillable = [
        'user_id', 'category_name', 'category_sort', 'category_featured','category_status',
		];
		
		protected $dates = ['deleted_at'];
		
		public function product()
		{
			return $this->hasMany('App\Product');
		}
	}
