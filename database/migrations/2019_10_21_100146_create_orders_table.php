<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateOrdersTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('orders', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('user_id', 100)->nullable();
				$table->decimal('order_amount', 20, 2)->nullable();
				$table->decimal('order_discount', 20, 2)->nullable();
				$table->decimal('order_charge', 20, 2)->nullable();
				$table->decimal('order_vat', 20, 2)->nullable();
				$table->decimal('order_net_amount', 20, 2)->nullable();
				$table->decimal('order_total_point', 20, 2)->nullable();
				$table->enum('order_delivery_type', ['cod', 'self']);
				$table->enum('order_delivery_from', ['office', 'dealer', 'user', 'admin']);
				$table->string('order_delivery_from_user_id', 100)->nullable();
				$table->string('order_delivery_name', 100)->nullable();
				$table->string('order_delivery_address', 100)->nullable();
				$table->string('order_delivery_phone', 100)->nullable();
				$table->string('order_delivery_mobile', 100)->nullable();
				$table->string('order_delivery_company', 100)->nullable();
				$table->string('order_delivery_status', 100)->nullable();
				$table->string('order_status', 100)->nullable();
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
			Schema::dropIfExists('orders');
		}
	}
