<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateBoardPlansTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('board_plans', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('user_id', 100)->nullable();
				$table->decimal('board_user_id', 20, 2)->nullable();
				$table->string('board_no', 100)->nullable();
				$table->dateTime('board_entry_date', 0)->nullable();
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
			Schema::dropIfExists('board_plans');
		}
	}
