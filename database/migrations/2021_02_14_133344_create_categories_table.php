<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {

			$table->increments('id');
			$table->string('name');
			$table->integer('parent_id')->unsigned()->default(0);
			$table->integer('sub')->unsigned()->default(0);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}
