<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class IncentiveSetting extends Model
	{
		public $timestamps = true;
		
		use SoftDeletes;
		
		protected $guarded = [];
		
		protected $dates = ['deleted_at'];
		
		protected $casts = [
		'created_at' => 'datetime:Y-m-d H:i:s A',
		];
	}
