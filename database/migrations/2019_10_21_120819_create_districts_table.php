<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateDistrictsTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('districts', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('division_id')->nullable();
				$table->string('name')->nullable();
				$table->string('bn_name')->nullable();
				$table->string('lat')->nullable();
				$table->string('lon')->nullable();
				$table->string('website')->nullable();
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
			Schema::dropIfExists('districts');
		}
	}
