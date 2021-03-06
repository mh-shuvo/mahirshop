<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateMemberBonusesTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('member_bonuses', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('user_id', 100)->nullable();
				$table->string('from_user_id', 100)->nullable();
				$table->decimal('amount', 20, 2)->nullable();
				$table->string('bonus_type', 100)->nullable();
				$table->string('details', 100)->nullable();
				$table->string('status', 100)->nullable();
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
			Schema::dropIfExists('member_bonuses');
		}
	}
