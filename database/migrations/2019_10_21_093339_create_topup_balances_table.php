<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateTopupBalancesTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('topup_balances', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('user_id', 100)->nullable();
				$table->string('from_user_id', 100)->nullable();
				$table->decimal('topup_amount', 20, 2)->nullable();
				$table->enum('topup_type', ['withdrawal', 'user', 'admin']);
				$table->enum('topup_flow', ['in', 'out']);
				$table->string('topup_generate_by', 100)->nullable();
				$table->string('topup_details', 100)->nullable();
				$table->string('topup_status', 100)->nullable();
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
			Schema::dropIfExists('topup_balances');
		}
	}
