<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStationPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_stations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_id')->unsigned()->nullable();
			$table->integer('station_id')->unsigned()->nullable();
			$table->decimal('points', 8, 2)->nullable();
			$table->integer('user_id')->unsigned()->nullable();
			$table->timestamp('start_time')->nullable();
			$table->timestamp('complete_time')->nullable();
			$table->integer('sort_order')->nullable();
			$table->timestamps();


			$table->foreign('order_id')
				->references('id')
				->on('orders')
				->onDelete('cascade');
			$table->foreign('station_id')
				->references('id')
				->on('stations')
				->onDelete('set null');
			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_stations');
	}

}
