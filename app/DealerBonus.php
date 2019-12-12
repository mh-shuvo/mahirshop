<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class DealerBonus extends Model
	{
		public $timestamps = true;
		
		use SoftDeletes;
		
		// protected $fillable = [
        // 'id'
		// ];
		
		protected $dates = ['deleted_at'];
	}
