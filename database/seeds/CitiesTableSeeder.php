<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $citiesUsed = [
            'Sofia', 'Varna', 'London', 'Paris', 'Berlin',
        ];

        foreach ($citiesUsed as $city) {
            City::firstOrCreate(['name' => $city]);
        }
    }
}
