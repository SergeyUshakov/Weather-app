<?php

use App\Models\DailyForecast;
use App\Models\HourlyForecast;
use App\Models\WeatherType;
use Illuminate\Database\Seeder;

class HourlyForecastTableSeeder extends Seeder
{
    protected $hoursInDay = 24;
    protected $minTemperature = -100;
    protected $maxTemperature = 100;
    protected $maxWindSpeed = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weatherIds = WeatherType::pluck('id');
        DailyForecast::each(function($dailyForecast) use ($weatherIds) {
            for($i = 0; $i < $this->hoursInDay; $i++) {
                $humidity = rand(0, 100);
                $windSpeed = rand(0, $this->maxWindSpeed);
                $feelTemperature = rand($this->minTemperature, $this->maxTemperature);
                $realTemperature = rand($this->minTemperature, $this->maxTemperature);
                $weatherId = $weatherIds->random();

                HourlyForecast::firstOrCreate(
                    [
                        'daily_forecast_id' => $dailyForecast->id,
                        'hour' => $i
                    ],
                    [
                        'feel_temperature' => $feelTemperature,
                        'real_temperature' => $realTemperature,
                        'humidity' => $humidity,
                        'weather_id' => $weatherId,
                        'wind_speed' => $windSpeed
                    ]
                );
            }
        });
    }
}
