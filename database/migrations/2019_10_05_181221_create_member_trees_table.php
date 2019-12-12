<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateMemberTreesTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('member_trees', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('user_id', 100)->nullable();
				$table->string('sponsor_id', 100)->nullable();
				$table->string('designation', 100)->nullable();
				$table->string('l_id', 100)->nullable();
				$table->string('r_id', 100)->nullable();
				$table->string('l_member', 100)->nullable();
				$table->string('r_member', 100)->nullable();
				$table->decimal('p_point', 20, 2)->nullable();
				$table->decimal('l_point', 20, 2)->nullable();
				$table->decimal('r_point', 20, 2)->nullable();
				$table->decimal('total_matching', 20, 2)->nullable();
				$table->decimal('paid_matching', 20, 2)->nullable();
				$table->date('last_matching')->nullable();
				$table->date('last_incentive')->nullable();
				$table->date('incentive_start_from')->nullable();
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
			Schema::dropIfExists('member_trees');
		}
	}
