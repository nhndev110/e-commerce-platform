<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('attribute_values', function (Blueprint $table) {
      $table->id('value_id');
      $table->foreignId('group_id')
        ->constrained('attribute_groups')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->string('value_name');
      $table->string('image')->nullable();
      $table->unsignedInteger('quantity');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('attribute_values');
  }
};
