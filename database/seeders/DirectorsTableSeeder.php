<?php

namespace Database\Seeders;

use App\Models\Director;
use Illuminate\Database\Seeder;

/**
 * Class DirectorsTableSeeder
 */
class DirectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directors = [
            [
                'firstname' => 'Woody',
                'lastname' => 'Allen',
                'birthday_date' => '1935:11:30'
            ],
            [
                'firstname' => 'Ingmar',
                'lastname' => 'Bergman',
                'birthday_date' => '1918:07:14'
            ],
            [
                'firstname' => 'Andrei',
                'lastname' => 'Tarkovsky',
                'birthday_date' => '1932:04:04'
            ],
            [
                'firstname' => 'Marlen',
                'lastname' => 'Khutsiev',
                'birthday_date' => '1925:10:04'
            ],
            [
                'firstname' => 'Kira',
                'lastname' => 'Muratova',
                'birthday_date' => '1935:11:05'
            ],
            [
                'firstname' => 'Sergei',
                'lastname' => 'Eisenstein',
                'birthday_date' => '1898:01:22'
            ],
            [
                'firstname' => 'Eldar',
                'lastname' => 'Ryazanov',
                'birthday_date' => '1927:11:18'
            ],
            [
                'firstname' => 'Sergei',
                'lastname' => 'Parajanov',
                'birthday_date' => '1924:01:09'
            ],
            [
                'firstname' => 'Eduard',
                'lastname' => 'Abalov',
                'birthday_date' => '1927:10:07'
            ],
        ];
        foreach ($directors as $director) {
            Director::factory()->create($director);
        }
    }
}
