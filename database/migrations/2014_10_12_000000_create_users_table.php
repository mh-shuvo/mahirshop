<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateUsersTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('users', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('name');
				$table->string('username')->unique();
				$table->string('phone')->unique();
				$table->text('address')->nullable();
				$table->string('email')->nullable();
				$table->string('position')->nullable();
				$table->string('city')->nullable();
				$table->string('state')->nullable();
				$table->string('country')->nullable();
				$table->string('post_code')->nullable();
				$table->string('txn_pin')->nullable();
				$table->string('national_id')->unique();
				$table->string('register_by')->nullable();
				$table->string('profile_picture')->nullable();
				$table->enum('user_type', ['admin', 'accountant', 'user', 'free', 'manager', 'dealer'])->default('free');
				$table->timestamp('is_generate_cupon_without_payment')->nullable();
				$table->timestamp('is_premium')->nullable();
				$table->timestamp('is_banned')->nullable();
				$table->timestamp('email_verified_at')->nullable();
				$table->string('password');
				$table->rememberToken();
				$table->timestamps();
				$table->softDeletes();
			});
		}
		
		/**
			* Reverse the migrations.
			*
			* @return void
		*/
		public function down()
		{
			Schema::dropIfExists('users');
		}
	}
