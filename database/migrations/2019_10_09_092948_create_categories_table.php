<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateCategoriesTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('categories', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->bigInteger('user_id')->unsigned()->nullable();
				$table->string('category_name', 100)->nullable();
				$table->string('category_sort', 100)->nullable();
				$table->enum('category_featured', array('True', 'False'))->nullable();
				$table->enum('category_status', array('Active', 'Inactive'))->nullable();
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
			Schema::dropIfExists('categories');
		}
	}
