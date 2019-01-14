<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHourlyForecast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hourly_forecast', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hour')->unsigned();
            $table->integer('humidity')->unsigned();
            $table->integer('wind_speed')->unsigned();
            $table->integer('feel_temperature');
            $table->integer('real_temperature');
            $table->unsignedInteger('weather_id');
            $table->unsignedInteger('daily_forecast_id');

            $table->foreign('weather_id')->references('id')->on('weather_types');
            $table->foreign('daily_forecast_id')->references('id')->on('daily_forecast');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hourly_forecast');
    }
}
