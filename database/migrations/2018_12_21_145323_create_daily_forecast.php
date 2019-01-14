<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyForecast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_forecast', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('highest_temperature');
            $table->integer('lowest_temperature');
            $table->date('date');
            $table->unsignedInteger('weather_id');
            $table->unsignedInteger('city_id');
            $table->integer('wind_speed')->unsigned();

            $table->foreign('weather_id')->references('id')->on('weather_types');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_forecast');
    }
}
