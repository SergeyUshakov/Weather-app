<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HourlyForecastCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $hourlyForecasts = [];

        foreach ($this->collection as $hourlyForecast) {
            array_push($hourlyForecasts, [
                'id' => $hourlyForecast->id,
                'hour' => $hourlyForecast->hour,
                'humidity' => $hourlyForecast->humidity,
                'wind_speed' => $hourlyForecast->wind_speed,
                'feel_temperature' => $hourlyForecast->feel_temperature,
                'real_temperature' => $hourlyForecast->real_temperature,
                'weather_type' => $hourlyForecast->weatherType()->name
            ]);
        }

        return $hourlyForecasts;
    }
}
