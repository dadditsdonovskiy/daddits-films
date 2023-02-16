<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FilmDirector
 * @property int $id
 * @property int $director_id
 * @property int $film_id
 * @property int $created_at
 * @property int $updated_at
 */
class FilmDirector extends Model
{
    use HasFactory;
    protected $table = 'film_director';
    protected $fillable = ['film_id', 'director_id'];
}
