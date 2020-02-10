<?php
	
	return [
	'company' => [
	'name' => 'Me Global Private Limited',
	'phone' => '01911',
	'address' => 'Dhaka',
	'district' => 'Dhaka'
	],
	
	'sponsor_bonus_percentage' => '10',
	'lavel_1_gen_bonus_percentage' => '16',
	'lavel_2_gen_bonus_percentage' => '12',
	'lavel_3_to_20_gen_bonus_percentage' => '4',
	'gen_bonus_percentage' => '8.5',
	'bonus_start_from' => '1000',
	'renew_purchase_value' => '1000',
	'premium_package_value' => '3000',
	'daily_cash_back_percentage' => '20',
	're_purchase_daily_cash_back_percentage' => '20',
	'first_rank_referral' => '10',
	'club_entry_referral' => '11',
	'withdrawal_vat' => '2',
	'withdrawal_charge' => '10',
	
	'daily_matching' => '80',
	'matching_bonus' => '300',
	'matching_target' => '3',
	
	'dealer_bonus_pv' => '25',
	'dealer_bonus' => '250',
	'dealer_company_bonus' => '300',
	'dealer_district_bonus' => '250',
	'dealer_upazila_bonus' => '200',
	'dealer_union_bonus' => '150',
	'dealer_sponsor_bonus' => '50',
	
	'incentives' => [
	'plan0' => [
	'title' => 'Territory Sales Officer',
	'name' => 'tso',
	'condition' => '20',
	'condition_type' => 'matching'
	],
	'plan1' => [
	'title' => 'Area Sales Manager',
	'name' => 'asm',
	'condition' => '100',
	'condition_type' => 'matching'
	],
	'plan2' => [
	'title' => 'Regional Sales Manager',
	'name' => 'rsm',
	'condition' => '250',
	'condition_type' => 'matching'
	],
	'plan3' => [
	'title' => 'Zonal Sales Manager',
	'name' => 'zsm',
	'condition' => '500',
	'condition_type' => 'matching'
	],
'plan4' => [
'title' => 'Divisional Sales Manager',
'name' => 'dsm',
'condition' => '1000',
'condition_type' => 'matching'
],
'plan5' => [
'title' => 'National Sales Manager',
'name' => 'nsm',
'l_condition' => '10',
'r_condition' => '6',
'condition_type' => 'dsm'
],
'plan6' => [
'title' => 'Asst. General Manager',
'name' => 'agm',
'l_condition' => '7',
'r_condition' => '4',
'condition_type' => 'nsm'
],
'plan7' => [
'title' => 'General Manager',
'name' => 'gm',
'l_condition' => '4',
'r_condition' => '3',
'condition_type' => 'agm'
],
'plan8' => [
'title' => 'Executive Director',
'name' => 'ed',
'l_condition' => '3',
'r_condition' => '2',
'condition_type' => 'gm'
]
],
];
