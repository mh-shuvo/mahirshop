<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateCountriesTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('countries', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('code')->nullable();
				$table->string('name')->nullable();
				$table->string('phonecode')->nullable();
				$table->string('currency_name')->nullable();
				$table->string('currency_symbol')->nullable();
				$table->string('currency_code')->nullable();
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
			Schema::dropIfExists('countries');
		}
	}
