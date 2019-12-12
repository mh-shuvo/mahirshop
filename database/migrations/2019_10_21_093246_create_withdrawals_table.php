<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateWithdrawalsTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('withdrawals', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('user_id', 100)->nullable();
				$table->string('pay_by_user_id', 100)->nullable();
				$table->decimal('withdrawal_amount', 20, 2)->nullable();
				$table->string('payment_method', 100)->nullable();
				$table->string('payment_method_details', 100)->nullable();
				$table->decimal('withdrawal_charge', 20, 2)->nullable();
				$table->decimal('vat_amount', 20, 2)->nullable();
				$table->decimal('total_withdrawal_amount', 20, 2)->nullable();
				$table->string('withdrawal_details', 100)->nullable();
				$table->string('withdrawal_status', 100)->nullable();
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
			Schema::dropIfExists('withdrawals');
		}
	}
