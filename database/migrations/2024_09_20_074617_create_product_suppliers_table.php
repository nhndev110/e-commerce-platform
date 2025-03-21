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
    Schema::create('product_suppliers', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('contact_name');
      $table->string('province')->nullable();
      $table->string('address')->nullable();
      $table->string('email')->nullable();
      $table->string('phone')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('product_suppliers');
  }
};
