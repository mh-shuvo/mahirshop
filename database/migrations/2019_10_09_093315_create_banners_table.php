<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateBannersTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('banners', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->bigInteger('user_id')->unsigned()->nullable();
				$table->string('banner_name', 100)->nullable();
				$table->text('banner_des', 100)->nullable();
				$table->text('banner_image', 100)->nullable();
				$table->string('banner_sort', 100)->nullable();
				$table->enum('banner_type', array('Slide', 'HomeBanner', 'CategoryBanner', 'BrandBanner'))->nullable();
				$table->enum('banner_status', array('Active', 'Inactive'))->nullable();
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
			Schema::dropIfExists('banners');
		}
	}
