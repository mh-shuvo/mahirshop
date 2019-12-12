<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateCuponCodesTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('cupon_codes', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('user_id', 100)->nullable();
				$table->string('from_user_id', 100)->nullable();
				$table->string('cupon_code', 100)->nullable();
				$table->decimal('cupon_amount', 20, 2)->nullable();
				$table->enum('cupon_type', ['withdrawal', 'user', 'admin']);
				$table->enum('cupon_flow', ['in', 'out']);
				$table->enum('cupon_check', ['used', 'unused']);
				$table->string('cupon_details', 100)->nullable();
				$table->string('cupon_status', 100)->nullable();
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
			Schema::dropIfExists('cupon_codes');
		}
	}
