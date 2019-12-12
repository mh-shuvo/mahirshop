<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;
	
	class MemberBonus extends Model
	{
		public $timestamps = true;
		
		use SoftDeletes;
		
		protected $guarded = [];
		
		protected $dates = ['deleted_at'];
	}
