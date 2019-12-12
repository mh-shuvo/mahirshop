<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateDealersTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('dealers', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('user_id', 100)->nullable();
				$table->string('dealer_type', 100)->nullable();
				$table->string('dealer_delivery_address', 100)->nullable();
				$table->string('dealer_delivery_phone', 100)->nullable();
				$table->string('dealer_delivery_email', 100)->nullable();
				$table->string('dealer_delivery_name', 100)->nullable();
				$table->string('dealer_delivery_city', 100)->nullable();
				$table->string('dealer_delivery_state', 100)->nullable();
				$table->string('dealer_delivery_country', 100)->nullable();
				$table->string('dealer_delivery_postcode', 100)->nullable();
				$table->decimal('dealer_bonus', 20, 2)->nullable();
				$table->decimal('dealer_ref_bonus', 20, 2)->nullable();
				$table->string('dealer_status', 100)->nullable();
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
			Schema::dropIfExists('dealers');
		}
	}
