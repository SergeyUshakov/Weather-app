<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DailyForecastResource extends JsonResource
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
            'highest_temperature' => $this->highest_temperature,
            'lowest_temperature' => $this->lowest_temperature,
            'date' => $this->date,
            'weather_id' => $this->weather_id,
            'wind_speed' => $this->wind_speed
        ];
    }
}
