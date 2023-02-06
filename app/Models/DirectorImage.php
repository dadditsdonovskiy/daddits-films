<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DirectorImage
 * @property int $id
 * @property int $director_id
 * @property string $firstname
 * @property string $lastname
 * @property int $type
 * @property int $file_size
 * @property string $url
 * @property int $created_at
 * @property int $updated_at
 */
class DirectorImage extends Model
{
    use HasFactory, Filterable;

    public const PROFILE_IMAGE = 1;

    public static array $types = [
        self::PROFILE_IMAGE,
    ];

    protected $fillable = ['url', 'type', 'file_size','director_id'];
}
