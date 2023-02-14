<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Film;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['name' => 'Ukraine'],
            ['name' => 'USSR']
        ];
        foreach ($countries as $country) {
            Country::factory()->create($country);
        }
    }
}
