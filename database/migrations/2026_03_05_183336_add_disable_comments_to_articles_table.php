<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisableCommentsToArticlesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(): void
  {
    Schema::table('articles', function (Blueprint $table) {
      $table->boolean('disable_comments')->default(0)->after('featured');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(): void
  {
    Schema::table('articles', function (Blueprint $table) {
      $table->dropColumn('disable_comments');
    });
  }
}
