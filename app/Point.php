<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class Point extends Model
	{
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
		
		public function FromUser()
		{
			return $this->belongsTo('App\User','from_user_id','id');
		}
	}
