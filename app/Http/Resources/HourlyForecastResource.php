<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HourlyForecastResource extends JsonResource
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
            'hour' => $this->hour,
            'humidity' => $this->humidity,
            'wind_speed' => $this->wind_speed,
            'feel_temperature' => $this->feel_temperature,
            'real_temperature' => $this->real_temperature,
            'weather_id' => $this->weather_id
        ];
    }
}
