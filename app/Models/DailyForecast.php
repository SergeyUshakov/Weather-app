<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyForecast extends Model
{
    protected $table = 'daily_forecast';
    public $timestamps = false;

    public function hourlyForecast()
    {
        return $this->hasMany('App\Models\HourlyForecast', 'id', 'daily_forecast_id');
    }

    public function weatherType()
    {
        return $this->hasOne('App\Models\WeatherType', 'id', 'weather_id')->first();
    }

    public function scopeFromDay($query, $date)
    {
        return $query->where('date', '>=', $date);
    }

    public function scopeToDay($query, $date)
    {
        return $query->where('date', '<=', $date);
    }

    public function scopeByCity($query, $id)
    {
        return $query->where("city_id", $id);
    }
}