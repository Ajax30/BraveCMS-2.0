<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {

          $table->unsignedInteger('article_id');
          $table->unsignedInteger('tag_id');
 
          //FOREIGN KEY
          $table->foreign('article_id')->references('id')->on('roles')->onDelete('cascade');
          $table->foreign('tag_id')->references('id')->on('permissions')->onDelete('cascade');
 
          //PRIMARY KEYS
          $table->primary(['article_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
}
