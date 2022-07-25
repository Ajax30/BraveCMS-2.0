<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name');
						$table->string('tagline');
						$table->string('owner_name');
						$table->string('owner_email');
						$table->string('twitter');
						$table->string('facebook');
						$table->string('instagram');
						$table->string('theme_directory');
                        $table->boolean('is_cookieconsent')->default(1);
                        $table->boolean('is_infinitescroll')->default(0);
						$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
