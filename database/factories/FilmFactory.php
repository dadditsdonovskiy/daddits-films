<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class DirectorFactory
 */
class FilmFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Film::class;

    public function definition(): array {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text,
            'published_at' => $this->faker->date(),
            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
