<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    public $timestamps = false;

    public function dailyForecasts()
    {
        return $this->hasMany('App\Models\DailyForecast', 'city_id', 'id');
    }
}
