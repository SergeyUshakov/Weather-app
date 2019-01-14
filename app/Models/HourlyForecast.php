<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HourlyForecast extends Model
{
    protected $table = 'hourly_forecast';
    public $timestamps = false;

    public function weatherType()
    {
        return $this->hasOne('App\Models\WeatherType', 'id', 'weather_id')->first();
    }

    public function scopeByDailyForecast($query, $id)
    {
        return $query->where("daily_forecast_id", $id);
    }
}