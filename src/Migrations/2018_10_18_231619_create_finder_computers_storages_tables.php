<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinderComputersStoragesTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        
        
        Schema::create(config('app.db-prefix', '').'directorys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->integer('user');
            $table->string('tags')->nullable();
            $table->text('details')->nullable();
            $table->string('mime');
            $table->string('size');
            $table->boolean('is_published')->default(0);
            $table->integer('order');
            $table->nullableTimestamps();
            $table->softDeletes();
        });
        Schema::create(config('app.db-prefix', '').'files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->integer('user');
            $table->string('tags')->nullable();
            $table->text('details')->nullable();
            $table->string('mime');
            $table->string('size');
            $table->boolean('is_published')->default(0);
            $table->integer('order');
            $table->nullableTimestamps();
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
		Schema::drop('directorys');
	}

}
