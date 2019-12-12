<?php
	
	namespace App\Console\Commands;
	
	use Illuminate\Console\Command;
	use App\MemberTree;
	use App\IncentiveSetting;
	use Illuminate\Support\Carbon;
	use App\MemberBonus;
	
	class IncentiveStatement extends Command
	{
		/**
			* The name and signature of the console command.
			*
			* @var string
		*/
		protected $signature = 'cron:statement:incentive';
		
		/**
			* The console command description.
			*
			* @var string
		*/
		protected $description = 'Member Incentive Bonus Update';
		
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
			$this->info(json_encode($this->getMemberBonus()));
		}
		
		
		private function getMemberBonus()
		{
			$getMembers = MemberTree::whereNotNull('designation')->whereNotNull('incentive_start_from')->get();
			
			$checkUpdate = false;
			foreach($getMembers as $key => $getMember){
				if(Carbon::parse($getMember['incentive_start_from'])->format('y-m-d') < Carbon::now()->format('y-m-d')){
					foreach($getMember->MemberIncentiveSetting as $IncentiveSetting){
						//Achiever Income
						if($IncentiveSetting->type == 'achiever'){
							if(Carbon::parse($getMember['last_incentive'])->add($IncentiveSetting->period, 'month')->format('y-m-d') <= Carbon::now()->format('y-m-d') || !$getMember['last_incentive'] && Carbon::parse($getMember['incentive_start_from'])->add($IncentiveSetting->period, 'month')->format('y-m-d') <= Carbon::now()->format('y-m-d')){
								$getMember->last_incentive = Carbon::now();
								$checkUpdate = true;
								$IncentiveSetting->last_incentive = Carbon::now();
								$IncentiveSetting->next_incentive = Carbon::now()->add($IncentiveSetting->period, 'month');
								if($IncentiveSetting->pay_amount){
									$achieverBonusData = new MemberBonus();
									$achieverBonusData->bonus_type = 'achiever';
									$achieverBonusData->incentive_type = $IncentiveSetting->designation;
									$achieverBonusData->user_id = $getMember['user_id'];
									$achieverBonusData->amount = $IncentiveSetting->pay_amount;
									$achieverBonusData->details = 'You have received '.$IncentiveSetting->pay_amount.' TK from '.$IncentiveSetting->title;
									$achieverBonusData->save();
								}
							}
						}
						//Chairman Club Income
						if($IncentiveSetting->type == 'chairman_club'){
							if(Carbon::parse($getMember['last_royalty_incentive'])->add($IncentiveSetting->period, 'month')->format('y-m-d') <= Carbon::now()->format('y-m-d') || !$getMember['last_royalty_incentive'] && Carbon::parse($getMember['incentive_start_from'])->add($IncentiveSetting->period, 'month')->format('y-m-d') <= Carbon::now()->format('y-m-d')){
								if($IncentiveSetting->pay_amount){
									$chairman_clubBonusData = new MemberBonus();
									$chairman_clubBonusData->bonus_type = 'chairman_club';
									$chairman_clubBonusData->user_id = $getMember['user_id'];
									$chairman_clubBonusData->amount = $IncentiveSetting->pay_amount;
									$chairman_clubBonusData->incentive_type = $IncentiveSetting->type;
									$chairman_clubBonusData->details = 'You have received '.$IncentiveSetting->pay_amount.' TK from '.$IncentiveSetting->title;
									$chairman_clubBonusData->save();
								}
								
								$getMember->last_royalty_incentive = Carbon::now();
								$checkUpdate = true;
								$IncentiveSetting->last_incentive = Carbon::now();
								$IncentiveSetting->next_incentive = Carbon::now()->add($IncentiveSetting->period, 'month');
								
							}
						}
						
						//NSM Royalty Income
						if($IncentiveSetting->type == 'nsm_royalty'){
							if(Carbon::parse($getMember['last_royalty_incentive'])->add($IncentiveSetting->period, 'month')->format('y-m-d') <= Carbon::now()->format('y-m-d') || !$getMember['last_royalty_incentive'] && Carbon::parse($getMember['incentive_start_from'])->add($IncentiveSetting->period, 'month')->format('y-m-d') <= Carbon::now()->format('y-m-d')){
								if($IncentiveSetting->pay_amount){
									$nsm_royaltyBonusData = new MemberBonus();
									$nsm_royaltyBonusData->bonus_type = 'nsm_royalty';
									$nsm_royaltyBonusData->user_id = $getMember['user_id'];
									$nsm_royaltyBonusData->amount = $IncentiveSetting->pay_amount;
									$nsm_royaltyBonusData->incentive_type = $IncentiveSetting->type;
									$nsm_royaltyBonusData->details = 'You have received '.$IncentiveSetting->pay_amount.' TK from '.$IncentiveSetting->title;
									$nsm_royaltyBonusData->save();
								}
								$getMember->last_royalty_incentive = Carbon::now();
								$checkUpdate = true;
								$IncentiveSetting->last_incentive = Carbon::now();
								$IncentiveSetting->next_incentive = Carbon::now()->add($IncentiveSetting->period, 'month');
							}
						}
						
						//ED Royalty Income
						if($IncentiveSetting->type == 'ed_royalty'){
							if(Carbon::parse($getMember['last_royalty_incentive'])->add($IncentiveSetting->period, 'month')->format('y-m-d') <= Carbon::now()->format('y-m-d') || !$getMember['last_royalty_incentive'] && Carbon::parse($getMember['incentive_start_from'])->add($IncentiveSetting->period, 'month')->format('y-m-d') <= Carbon::now()->format('y-m-d')){
								if($IncentiveSetting->pay_amount){
									$ed_royaltyBonusData = new MemberBonus();
									$ed_royaltyBonusData->bonus_type = 'ed_royalty';
									$ed_royaltyBonusData->user_id = $getMember['user_id'];
									$ed_royaltyBonusData->amount = $IncentiveSetting->pay_amount;
									$ed_royaltyBonusData->incentive_type = $IncentiveSetting->type;
									$ed_royaltyBonusData->details = 'You have received '.$IncentiveSetting->pay_amount.' TK from '.$IncentiveSetting->title;
									$ed_royaltyBonusData->save();
								}
								$getMember->last_royalty_incentive = Carbon::now();
								$checkUpdate = true;
								$IncentiveSetting->last_incentive = Carbon::now();
								$IncentiveSetting->next_incentive = Carbon::now()->add($IncentiveSetting->period, 'month');
							}
						}
						
						//Stockist Royalty Income
						if($IncentiveSetting->type == 'stockist_royalty'){
							if(Carbon::parse($getMember['last_royalty_incentive'])->add($IncentiveSetting->period, 'month')->format('y-m-d') <= Carbon::now()->format('y-m-d') || !$getMember['last_royalty_incentive'] && Carbon::parse($getMember['incentive_start_from'])->add($IncentiveSetting->period, 'month')->format('y-m-d') <= Carbon::now()->format('y-m-d')){
								if($IncentiveSetting->pay_amount){
									$stockist_royaltyBonusData = new MemberBonus();
									$stockist_royaltyBonusData->bonus_type = 'stockist_royalty';
									$stockist_royaltyBonusData->user_id = $getMember['user_id'];
									$stockist_royaltyBonusData->amount = $IncentiveSetting->pay_amount;
									$stockist_royaltyBonusData->incentive_type = $IncentiveSetting->type;
									$stockist_royaltyBonusData->details = 'You have received '.$IncentiveSetting->pay_amount.' TK from '.$IncentiveSetting->title;
									$stockist_royaltyBonusData->save();
								}
								$getMember->last_royalty_incentive = Carbon::now();
								$checkUpdate = true;
								$IncentiveSetting->last_incentive = Carbon::now();
								$IncentiveSetting->next_incentive = Carbon::now()->add($IncentiveSetting->period, 'month');
							}
						}
						if($checkUpdate){
							$IncentiveSetting->save();
						}
					}
					
					if($checkUpdate){
						// $getMember->last_incentive = null;
						// $getMember->last_royalty_incentive = null;
						$getMember->save();
					}
				}
			}
		}
	}
