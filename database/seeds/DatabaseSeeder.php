<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(WeatherTypesTableSeeder::class);
        $this->call(DailyForecastTableSeeder::class);
        $this->call(HourlyForecastTableSeeder::class);
    }
}
