<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class DirectorFactory
 */
class CountryFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Country::class;

    public function definition(): array {
        return [
            'name' => $this->faker->text,
            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
