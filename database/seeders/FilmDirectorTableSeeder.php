<?php

namespace Database\Seeders;

use App\Models\FilmDirector;
use Illuminate\Database\Seeder;

/**
 * Class FilmDirectorsTableSeeder
 * @package Database\Seeders
 */
class FilmDirectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $film1 = [
            'film_id' => 1,//solyaris
            'director_id' => 3//tarkovskiy
        ];
        $film2 = [
            'film_id' => 2,//ivanovo detstvo
            'director_id' => 3//tarkovskiy
        ];
        FilmDirector::factory($film1)->create();
        FilmDirector::factory($film2)->create();
    }
}
