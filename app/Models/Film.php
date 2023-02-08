<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

/**
 * Class Film
 * @property string  $title
 * @property string $description
 * @method static Builder|self byOrder(string $defaultOrder, string $value, ?string $fieldName)
 */
class Film extends Model
{
    use HasFactory, Filterable;

    protected $fillable = ['title', 'description', 'published_at'];

    /**
     * @param Builder $query
     * @param string $defaultOrder
     * @param string|null $value
     * @param string|null $fieldName
     * @return Builder
     */
    public function scopeByOrder(Builder $query, string $defaultOrder, ?string $value, ?string $fieldName): Builder
    {
        return $fieldName && $value ? $query->orderBy($fieldName, $value) :
            $query->orderBy($defaultOrder, 'DESC');
    }
}
