<?php

use App\Models\City;
use App\Models\DailyForecast;
use App\Models\WeatherType;
use Illuminate\Database\Seeder;

class DailyForecastTableSeeder extends Seeder
{
    protected $daysFromNow = 14;
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
        City::each(function($city) use($weatherIds) {
            for ($i = 0; $i <= $this->daysFromNow; $i++) {
                $time = strtotime("{$i} day");
                $today = date('Y-m-d', $time);
                $highestTemperature = rand($this->minTemperature, $this->maxTemperature);
                $lowestTemperature = rand($this->minTemperature, $highestTemperature - 1);
                $weatherId = $weatherIds->random();
                $windSpeed = rand(0, $this->maxWindSpeed);

                DailyForecast::firstOrCreate(
                    [
                        'city_id' => $city->id,
                        'date' => $today
                    ],
                    [
                        'highest_temperature' => $highestTemperature,
                        'lowest_temperature' => $lowestTemperature,
                        'weather_id' => $weatherId,
                        'wind_speed' => $windSpeed
                    ]
                );
            }
        });
    }
}
