<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'dayForecasts' => $this->getDailyForecasts()
        ];
    }

    private function getDailyForecasts()
    {
        $today = date('Y-m-d', strtotime("0 day"));
        $weekFromNow = date('Y-m-d', strtotime("7 day"));

        return $this->dailyForecasts()->select('id', 'highest_temperature', 'lowest_temperature', 'date', 'weather_id', 'wind_speed')
            ->fromDay($today)
            ->toDay($weekFromNow)
            ->get();
    }
}
