<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinderComputersHistorysTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        
        
        // Schema::create(config('app.db-prefix', '').'directorys', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->string('location');
        //     $table->integer('user');
        //     $table->string('tags')->nullable();
        //     $table->text('details')->nullable();
        //     $table->string('mime');
        //     $table->string('size');
        //     $table->boolean('is_published')->default(0);
        //     $table->integer('order');
        //     $table->nullableTimestamps();
        //     $table->softDeletes();
        // });
        // Schema::create(config('app.db-prefix', '').'files', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->string('location');
        //     $table->integer('user');
        //     $table->string('tags')->nullable();
        //     $table->text('details')->nullable();
        //     $table->string('mime');
        //     $table->string('size');
        //     $table->boolean('is_published')->default(0);
        //     $table->integer('order');
        //     $table->nullableTimestamps();
        //     $table->softDeletes();
        // });

        // Schema::create(config('app.db-prefix', '').'images', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('location');
        //     $table->string('name')->nullable();
        //     $table->string('original_name');
        //     $table->string('storage_location')->default('local');
        //     $table->string('alt_tag')->nullable();
        //     $table->string('title_tag')->nullable();
        //     $table->boolean('is_published')->default(0);
        //     $table->integer('entity_id');
        //     $table->string('entity_type');
        //     $table->nullableTimestamps();
        //     $table->softDeletes();
        // });
        // Schema::create(config('app.db-prefix', '').'imageables', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('image_id')->nullable();
        //     // $table->foreign('image_id')->references('id')->on('images');
        //     $table->unsignedInteger('imageable_id');
        //     $table->string('imageable_type');
        // });


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('directorys');
	}

}
