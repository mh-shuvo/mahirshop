<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class Dealer extends Model
	{
		public $timestamps = true;
		
		use SoftDeletes;
		
		protected $guarded = [];
		
		protected $dates = ['deleted_at'];
		
		public function State()
		{
			return $this->belongsTo('App\Divisions','division_id','id');
		}
		
		public function User()
		{
			return $this->belongsTo('App\User','user_id','id');
		}
		
		public function City()
		{
			return $this->belongsTo('App\Districts','district_id','id');
		}
		
		public function Upazila()
		{
			return $this->belongsTo('App\Upazila','upazila_id','id');
		}
		
		public function getUpazilaNameAttribute()
		{
				return "{$this->Upazila->name}";
		}
		
		public function getDistrictNameAttribute()
		{
				return "{$this->City->name}";
		}
	}
