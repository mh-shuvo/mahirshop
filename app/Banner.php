<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class Banner extends Model
	{
		public $timestamps = true;
		use SoftDeletes;
		
		protected $fillable = [
        'user_id', 'banner_name', 'banner_des', 'banner_image','banner_sort','banner_type','banner_status',
		];
		
		protected $dates = ['deleted_at'];
	}
