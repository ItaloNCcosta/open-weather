<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('weather', function (Blueprint $table) {
      $table->ulid('id')->primary();
      $table->string('city');
      $table->string('temp');
      $table->string('temp_max')->nullable();
      $table->string('temp_min')->nullable();
      $table->string('weather_main')->nullable();
      $table->string('description')->nullable();
      $table->string('humidity')->nullable();
      $table->string('icon')->nullable();
      $table->string('api')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('weather');
  }
};
