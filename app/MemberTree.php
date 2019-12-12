<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class MemberTree extends Model
	{
		public $timestamps = true;
		
		use SoftDeletes;
		
		protected $guarded = [];
		
		protected $dates = ['deleted_at'];
		
		public function Users()
		{
			return $this->belongsTo('App\User','user_id','id');
		}
		
		public function Sponsor()
		{
			return $this->belongsTo('App\User','sponsor_id','id');
		}
		
		public function TeamA()
		{
			return $this->belongsTo('App\User','l_id','id');
		}
		
		public function TeamB()
		{
			return $this->belongsTo('App\User','r_id','id');
		}
		
		public function MemberIncentiveSetting()
		{
			return $this->hasMany('App\IncentiveSetting','designation','designation');
		}
		
		public function memberDesignation()
		{
			return $this->hasOne('App\Designation','designation_name','designation');
		}
	}
