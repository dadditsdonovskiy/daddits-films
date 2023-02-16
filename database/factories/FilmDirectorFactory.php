<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\FilmDirector;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class DirectorFactory
 */
class FilmDirectorFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = FilmDirector::class;

    public function definition(): array {
        return [
            'created_at' => time(),
            'updated_at' => time()
        ];
    }
}
