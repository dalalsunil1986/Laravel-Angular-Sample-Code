<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropSelectedFabricTypes extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::drop('selected_fabric_types');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::create('selected_fabric_types', function(Blueprint $table) {
      $table->increments('id');
      $table->integer('fabric_id')->unsigned();
      $table->integer('type_id')->unsigned();
      $table->timestamps();

      $table->foreign('fabric_id')
            ->references('id')
            ->on('fabrics');

      $table->foreign('type_id')
            ->references('id')
            ->on('fabric_types');
    });
  }

}
