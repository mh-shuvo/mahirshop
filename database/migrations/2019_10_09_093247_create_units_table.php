<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateUnitsTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('units', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->bigInteger('user_id')->unsigned()->nullable();
				$table->string('unit_name', 100)->nullable();
				$table->string('unit_sort', 100)->nullable();
				$table->enum('unit_status', array('Active', 'Inactive'))->nullable();
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
			Schema::dropIfExists('units');
		}
	}
