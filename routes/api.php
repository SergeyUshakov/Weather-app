<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/daily_forecasts/{city_id}', 'DailyForecastController@index');

Route::get('/hourly_forecasts/{forecast_id}', 'HourlyForecastController@index');

Route::resource('cities', 'CitiesController')
    ->only(['index', 'show']);
