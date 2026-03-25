<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @author Robby Tan
 */
return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('book', function (Blueprint $table) {
      $table->string('isbn', 13)->primary();
      $table->string('title', 100);
      $table->string('author', 100);
      $table->string('description', 400);
      $table->year('publish_year');
      $table->string('cover', 100)->nullable();
      $table->integer('category_id');
      $table->foreign('category_id')->references('id')->on('category')->onUpdate('cascade')->onDelete('restrict');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('book');
  }
};
