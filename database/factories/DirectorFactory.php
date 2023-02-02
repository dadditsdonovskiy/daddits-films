<?php

namespace Database\Factories;

use App\Models\Director;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class DirectorFactory
 */
class DirectorFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Director::class;

    public function definition(): array {
        return [
            'firstname' => $this->faker->name,
            'lastname' => $this->faker->name,
            'birthday_date' => $this->faker->date(),
            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
