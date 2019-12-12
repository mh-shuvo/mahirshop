<?php
	
	namespace App;
	
	use Illuminate\Database\Eloquent\Model;
	
	class OrderItems extends Model
	{
		public $timestamps = true;
		
		use SoftDeletes;
		
		// protected $fillable = [
        // 'id'
		// ];
		
		protected $dates = ['deleted_at'];
	}
