<?php
	
	namespace App;
	
	use Illuminate\Notifications\Notifiable;
	use Illuminate\Contracts\Auth\MustVerifyEmail;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Spatie\Permission\Traits\HasRoles;
	
	class User extends Authenticatable
	{
		use Notifiable,HasRoles;
		
		/**
			* The attributes that are mass assignable.
			*
			* @var array
		*/
		protected $fillable = [
        'name', 'email', 'username', 'phone', 'address', 'position', 'city', 'state', 'country', 'post_code', 'txn_pin', 'national_id', 'user_type', 'is_signup_without_payment', 'profile_picture', 'password',
		];
		
		/**
			* The attributes that should be hidden for arrays.
			*
			* @var array
		*/
		protected $hidden = [
        'password', 'remember_token',
		];
		
		/**
			* The attributes that should be cast to native types.
			*
			* @var array
		*/
		protected $casts = [
        'email_verified_at' => 'datetime',
		];
		
		public function MemberTree()
		{
			return $this->hasOne('App\MemberTree','user_id','id');
		}
		public function State()
		{
			return $this->belongsTo('App\Divisions','state','id');
		}
		public function City()
		{
			return $this->belongsTo('App\Districts','city','id');
		}
		
	}
