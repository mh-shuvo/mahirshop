<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateProductsTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('products', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->bigInteger('category_id')->unsigned()->nullable();
				$table->bigInteger('brand_id')->unsigned()->nullable();
				$table->bigInteger('unit_id')->unsigned()->nullable();
				$table->bigInteger('user_id')->unsigned()->nullable();
				$table->string('product_name', 100)->nullable();
				$table->string('product_code', 100)->nullable();
				$table->text('product_des', 100)->nullable();
				$table->string('product_base_price', 100)->nullable();
				$table->string('product_discount_price', 100)->nullable();
				$table->string('product_vat', 100)->nullable();
				$table->string('product_point', 100)->nullable();
				$table->string('product_image', 100)->nullable();
				$table->enum('product_featured', array('True', 'False'))->nullable();
				$table->enum('product_type', array('Single', 'Bundle'))->nullable();
				$table->enum('product_status', array('Active', 'Inactive'))->nullable();
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
			Schema::dropIfExists('products');
		}
	}
