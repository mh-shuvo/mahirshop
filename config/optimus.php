<?php
	
	/*
		* This file is part of Laravel Optimus.
		*
		* (c) Anton Komarev <anton@komarev.com>
		*
		* For the full copyright and license information, please view the LICENSE
		* file that was distributed with this source code.
	*/
	
	declare(strict_types=1);
	
	return [
	
    /*
		|--------------------------------------------------------------------------
		| Default Connection Name
		|--------------------------------------------------------------------------
		|
		| Here you may specify which of the connections below you wish to use as
		| your default connection for all work. Of course, you may use many
		| connections at once using the manager class.
		|
	*/
	
    'default' => 'main',
	
    /*
		|--------------------------------------------------------------------------
		| Optimus Connections
		|--------------------------------------------------------------------------
		|
		| Here are each of the connections setup for your application. Example
		| configuration has been included, but you may add as many connections as
		| you would like.
		|
	*/
	
    'connections' => [
	
	'main' => [
	'prime' => '1580030173',
	'inverse' => '59260789',
	'random' => '1163945558',
	],
	
	'custom' => [
	'prime' => '1580030173',
	'inverse' => '1000000000',
	'random' => '1580030173',
	],
	
    ],
	
	];
