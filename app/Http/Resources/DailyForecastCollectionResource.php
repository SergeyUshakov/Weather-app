<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DailyForecastCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $dailyForecasts = [];

        foreach ($this->collection as $dailyForecast) {
            array_push($dailyForecasts, [
                'id' => $dailyForecast->id,
                'highest_temperature' => $dailyForecast->highest_temperature,
                'lowest_temperature' => $dailyForecast->lowest_temperature,
                'date' => $dailyForecast->date,
                'day' => $this->getDay($dailyForecast->date),
                'weather_type' => $dailyForecast->weatherType()->name,
                'wind_speed' => $dailyForecast->wind_speed
            ]);
        }

        return $dailyForecasts;
    }

    /**
     * @param $date - format: Y-m-d
     * @return false|string - day of the week
     */
    protected function getDay($date)
    {
        $today = date('Y-m-d', strtotime("0 day"));
        $unixTimestamp = strtotime($date);

        if ($date != $today) {
            $dayOfWeek = date('l', $unixTimestamp);
        } else {
            $dayOfWeek = 'Today';
        }

        return $dayOfWeek;
    }
}
