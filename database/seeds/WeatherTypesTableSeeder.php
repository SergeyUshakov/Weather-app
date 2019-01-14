<?php

use App\Models\WeatherType;
use Illuminate\Database\Seeder;

class WeatherTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weatherTypes = [
            'Rainy', 'Stormy', 'Sunny', 'Cloudy'
        ];

        foreach ($weatherTypes as $type) {
            WeatherType::firstOrCreate(['name' => $type]);
        }
    }
}
