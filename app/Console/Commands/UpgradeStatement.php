<?php
	
	namespace App\Console\Commands;
	
	use Illuminate\Console\Command;
	use App\MemberTree;
	use App\MemberBonus;
	use App\Point;
	use App\Traits\PointTrait;
	use Illuminate\Support\Carbon;
	
	class UpgradeStatement extends Command
	{
		
		use PointTrait;
		/**
			* The name and signature of the console command.
			*
			* @var string
		*/
		protected $signature = 'cron:statement:upgrade';
		
		/**
			* The console command description.
			*
			* @var string
		*/
		protected $description = 'Member Auto Upgrade';
		
		/**
			* Create a new command instance.
			*
			* @return void
		*/
		public function __construct()
		{
			parent::__construct();
		}
		
		/**
			* Execute the console command.
			*
			* @return mixed
		*/
		public function handle()
		{
			$this->info(json_encode($this->memberUpgrade()));
		}
		
		public function memberUpgrade()
		{
			$getMembers = MemberTree::whereNull('is_premium')->get();
			
			$checkUpdate = false;
			foreach($getMembers as $key => $getMember){
				if($this->AvaliablePointByUserId($getMember->user_id)->point_available >= config('mlm.premium_registration_point')){
					$sponsorBonusData = new MemberBonus();
					$sponsorBonusData->user_id = $getMember->sponsor_id;
					$sponsorBonusData->from_user_id = $getMember->user_id;
					$sponsorBonusData->bonus_type = 'sponsor';
					$sponsorBonusData->amount = config('mlm.sponsor_bonus');
					$sponsorBonusData->details = 'You have received '.config('mlm.sponsor_bonus').' Tk Sponsor bonus from '.$getMember->Users->username;
					$sponsorBonusData->status = 'active';
					$sponsorBonusData->save();
					
						Point::create([
            			'user_id' => $getMember->user_id,
            			'from_user_id' =>  $getMember->user_id,
            			'point_amount' => config('mlm.premium_registration_point'),
            			'point_flow' => 'out',
            			'point_details' => 'You have Upgrade your account with '.config('mlm.premium_registration_point').' PV',
            			'point_status' => 'active'
            			]);
					
					$getMember->is_premium = Carbon::now();
					$getMember->save();
				}
			}
		}
		
	}
