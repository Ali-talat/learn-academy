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
            $table->string('logo');
            $table->string('favicon');
            $table->string('mobile');
            $table->string('address');
            $table->string('sity');
            $table->string('phone');
            $table->string('work_hours');
            $table->text('map');
            $table->string('fb');
            $table->string('twitter');
            $table->string('insta');

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
