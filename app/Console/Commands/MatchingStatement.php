<?php
	
	namespace App\Console\Commands;
	
	use Illuminate\Console\Command;
	use App\MemberTree;
	use App\Designation;
	use App\MemberBonus;
	use App\Point;
	use Illuminate\Support\Carbon;
	
	class MatchingStatement extends Command
	{
		/**
			* The name and signature of the console command.
			*
			* @var string
		*/
		protected $signature = 'cron:statement:matching';
		
		/**
			* The console command description.
			*
			* @var string
		*/
		protected $description = 'Member Matching Earning Statement';
		
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
			$totalMembers = MemberTree::all();
			$this->info(json_encode($this->getCount(MemberTree::first()->user_id)));
		}
		
		private function getCount($member)
		{
			$getMember = MemberTree::where('user_id',$member)->first();
			
			$totalMatching['matching_total'] = 0;
			$totalMatching['matching_l'] = 0;
			$totalMatching['matching_r'] = 0;
			
			$totalMember['premium_l'] = 0;
			$totalMember['premium_r'] = 0;
			$totalMember['premium'] = 0;
			
			$totalMember['free_l'] = 0;
			$totalMember['free_r'] = 0;
			$totalMember['free'] = 0;
			$totalMember['total'] = 0;
			
			$checkUpdate = false;
			
			foreach(config('mlm.incentives') as $value){
				$totalPlan[$value['name']] = 0;
				$totalPlanL[$value['name']] = 0;
				$totalPlanR[$value['name']] = 0;
			}
			
			
			if(!empty($getMember['l_id']))
			{
				$lId = $this->getCount($getMember['l_id']);
				
				if($lId['is_valid'] != null){
					$totalMatching['matching_l'] += $lId['matching']['matching_total'] + 1;
				}
				
				if($lId['is_valid'] == null){
					$totalMatching['matching_l'] = $lId['matching']['matching_total'];
				}
				
				if($lId['is_premium'] != null){
					$totalMember['premium_l'] += $lId['total_member']['premium'] + 1;
					$totalMember['free_l'] = $lId['total_member']['free'];
				}
				
				if($lId['is_premium'] == null){
					$totalMember['free_l'] += $lId['total_member']['free'] + 1;
					$totalMember['premium_l'] = $lId['total_member']['premium'];
				}
				
				foreach(config('mlm.incentives') as $value){
					if($lId['member_designation'] == $value['name']){
						$totalPlanL[$value['name']] += $lId['total'][$value['name']] + 1;
						}else{
						$totalPlanL[$value['name']] = $lId['total'][$value['name']];
					}
				}
			}
			
			if(!empty($getMember['r_id']))
			{
				$rId =$this->getCount($getMember['r_id']);
				
				if($rId['is_valid'] != null){
					$totalMatching['matching_r'] += $rId['matching']['matching_total'] + 1;
				}
				
				if($rId['is_valid'] == null){
					$totalMatching['matching_r'] = $rId['matching']['matching_total'];
				}
				
				if($rId['is_premium'] != null){
					$totalMember['premium_r'] += $rId['total_member']['premium'] + 1;
					$totalMember['free_r'] = $rId['total_member']['free'];
				}
				
				if($rId['is_premium'] == null){
					$totalMember['premium_r'] = $rId['total_member']['premium'];
					$totalMember['free_r'] += $rId['total_member']['free'] + 1;
				}
				
				
				foreach(config('mlm.incentives') as $value){
					if($rId['member_designation'] == $value['name'] ){
						$totalPlanR[$value['name']] += $rId['total'][$value['name']] + 1;
						}else{
						$totalPlanR[$value['name']]= $rId['total'][$value['name']];
					}
				}
			}
			$totalMatching['matching_total'] += $totalMatching['matching_l'] + $totalMatching['matching_r'];
			$totalMember['premium'] +=  $totalMember['premium_l'] + $totalMember['premium_r'];
			$totalMember['free'] +=  $totalMember['free_l'] + $totalMember['free_r'];
			$totalMember['total'] +=  $totalMember['free'] + $totalMember['premium'];
			
			foreach(config('mlm.incentives') as $value){
				$totalPlan[$value['name']] +=  $totalPlanL[$value['name']] + $totalPlanR[$value['name']];
			}
			
			// Total Member Count
			if(($totalMember['premium_l'] + $totalMember['free_l']) > 0){
				$getMember->l_member = ($totalMember['premium_l'] + $totalMember['free_l']);
				$checkUpdate = true;
				}else{
				$getMember->l_member = null;
			}
			
			if(($totalMember['premium_r'] + $totalMember['free_r']) > 0){
				$getMember->r_member = ($totalMember['premium_r'] + $totalMember['free_r']);
				$checkUpdate = true;
				}else{
				$getMember->r_member = null;
			}
			
			// Total Member Matching Count
			if($totalMatching['matching_l'] > 0){
				$getMember->l_matching = $totalMatching['matching_l'];
				$checkUpdate = true;
				}else{
				$getMember->l_matching = null;
			}
			
			if($totalMatching['matching_r'] > 0){
				$getMember->r_matching = $totalMatching['matching_r'];
				$checkUpdate = true;
				}else{
				$getMember->r_matching = null;
			}
			
			// if($totalMatching['matching_l'] > 0 && $totalMatching['matching_r'] > 0 && $getMember->last_matching < Carbon::now()->format('Y-m-d') ){
			if($totalMember['premium_l'] > 0 && $totalMember['premium_r'] > 0){
				$totalMachingCount = 0;
				if($totalMember['premium_l'] >= $totalMember['premium_r']){
					$totalMachingCount= $totalMember['premium_r'];
					}elseif($totalMember['premium_l'] <= $totalMember['premium_r']){
					$totalMachingCount= $totalMember['premium_l'];
				}
				
				// Flashing Condition
				if($getMember['total_matching']){
					$newMatching = $totalMachingCount - $getMember['total_matching'];
					}else{
					$newMatching = $totalMachingCount;
				}
				
				$newMatching = $this->matchingCount($newMatching,config('mlm.matching_target'));
				
				if($newMatching > 0){
					if($newMatching >= config('mlm.daily_matching')){
						$matchingBonush = config('mlm.daily_matching');
						}else{
						$matchingBonush = $newMatching;
					}
					
					// Matching Bonus
					if($matchingBonush > 3){
						$matchingBonushAmount = $matchingBonush * config('mlm.matching_bonus');
						$memberBonusData = new MemberBonus();
						$memberBonusData->bonus_type = 'matching';
						$memberBonusData->user_id = $getMember['user_id'];
						$memberBonusData->amount = $matchingBonushAmount;
						$memberBonusData->details = 'You have received '.$matchingBonushAmount.' TK for '.$matchingBonush.' Matching Bonus';
						$memberBonusData->save();
						
						$getMember->paid_matching = $totalMachingCount + $getMember['paid_matching'];
						$getMember->total_matching = $totalMachingCount;
						$getMember->last_matching = Carbon::now();
						$checkUpdate = true;
					}
				}
				
				//Designation Upgrade
				// if(config('mlm.incentives.plan0.condition') <= $totalMachingCount){
				// $i = -1;
				// foreach(config('mlm.incentives') as $key => $value){
				// if($i == -1){
				// $planName = null;
				// }else{
				// $planName = config('mlm.incentives.plan'.$i.'.name');
				// }
				
				// if($getMember['designation'] == $planName && $value['condition_type'] == 'matching' && $value['condition'] <= $totalMachingCount){
				// $getMember->designation = $value['name'];
				// $getMember->incentive_start_from = Carbon::now();
				
				// $designationData = new Designation();
				// $designationData->user_id = $getMember['user_id'];
				// $designationData->designation_title = $value['title'];
				// $designationData->designation_name = $value['name'];
				// $designationData->status = 'active';
				// $designationData->save();
				// $checkUpdate = true;
				// }elseif($getMember['designation'] == $value['condition_type'] && $this->getRatioCheck($totalPlanL[$planName], $totalPlanR[$planName],$value['l_condition'],$value['r_condition'])){
				// $getMember->designation = $value['name'];
				// $getMember->incentive_start_from = Carbon::now();
				
				// $designationData = new Designation();
				// $designationData->user_id = $getMember['user_id'];
				// $designationData->designation_title = $value['title'];
				// $designationData->designation_name = $value['name'];
				// $designationData->status = 'active';
				// $designationData->save();
				// $checkUpdate = true;
				// }
				// $i++;
				// }
				// }
			}
			
			$totalMemberDetails = [
			'total_member' => $totalMember, 
			'total' => $totalPlan,
			'member_designation' => $getMember['designation'],
			'is_premium' => $getMember['is_premium'],
			'is_valid' => $getMember['is_valid'],
			'matching' => $totalMatching,
			];
			
			if($checkUpdate){
				$getMember->extra_data = json_encode($totalMemberDetails);
				$getMember->save();
			}
			
			return $totalMemberDetails;
			
		}
		
		
		private function matchingCount($value,$compareValue,$count = 0){
			if($value >= $compareValue){
				$count++;
				$compareValues = $compareValue * $count + $compareValue;
				if($value >= $compareValues){
					$count = $this->matchingCount($value,$compareValue,$count);
				}
			}
			
			return $count;
		}
		
		private function getRatioCheck($lMember, $rMember,$lCondition,$rCondition){
			$totalMember = $lMember + $rMember;
			$totalCondition = $lCondition + $rCondition;
			if($totalCondition <= $totalMember){
				if($lMember > $rMember){
					if($lMember >= $lCondition && $rMember >= $rCondition){
						return true;
					}
					}else{
					if($rMember >= $lCondition && $lMember >= $rCondition){
						return true;
					}
				}
			}
			return false;
		}
		
	}
