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
        Director::factory()->create([
            'firstname' => 'Woody',
            'lastname' => 'Allen',
            'birthday_date'=>'1935:11:30'
        ]);
        Director::factory()->create([
            'firstname' => 'Ingmar',
            'lastname' => 'Bergman',
            'birthday_date'=>'1918:07:14'
        ]);
    }
}
