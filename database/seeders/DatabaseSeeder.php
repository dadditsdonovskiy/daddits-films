<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(DirectorsTableSeeder::class);
         $this->call(FilmsTableSeeder::class);
         $this->call(CountriesTableSeeder::class);
         $this->call(FilmDirectorTableSeeder::class);
    }
}
