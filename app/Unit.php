<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class Unit extends Model
	{
		public $timestamps = true;
		use SoftDeletes;
		
		protected $fillable = [
        'user_id', 'unit_name', 'unit_sort', 'unit_status',
		];
		
		protected $dates = ['deleted_at'];
		
		public function product()
		{
			return $this->hasMany('App\Product');
		}
	}
