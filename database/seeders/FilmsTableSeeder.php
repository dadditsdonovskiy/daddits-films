<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filmSolaris = [
            'title' => 'Solyaris',
            'description' => 'Kris Kelvin joins the space station orbiting the planet Solaris, only to find its two crew members plagued by "phantoms," creations of Solaris. Kelvin is soon confronted with his own phantom, taking the shape of his dead wife Hari.',
            'released_at' => '1968:02:05'
        ];
        $filmsIvanovoDetstvo = [
            'title' => 'Ivanovo detstvo',
            'description' => 'During WWII, Soviet orphan Ivan Bondarev strikes up a friendship with three sympathetic Soviet officers while working as a scout behind the German lines.',
            'released_at' => '1962:04:06'
        ];
        Film::factory()->create($filmSolaris);
        Film::factory()->create($filmsIvanovoDetstvo);
    }
}
