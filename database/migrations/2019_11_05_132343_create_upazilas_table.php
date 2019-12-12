<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateUpazilasTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('upazilas', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->bigInteger('district_id')->nullable();
				$table->string('name')->nullable();
				$table->string('bn_name')->nullable();
				$table->string('sort')->nullable();
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
			Schema::dropIfExists('upazilas');
		}
	}
