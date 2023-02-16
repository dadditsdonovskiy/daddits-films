<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class Film
 * @property string  $title
 * @property string $description
 * @property string $released_at
 * @property int $created_at
 * @method static Builder|self byOrder(string $defaultOrder, string $value, ?string $fieldName)
 */
class Film extends Model
{
    use HasFactory, Filterable, Sortable;

    protected $fillable = ['title', 'description', 'released_at'];

    public $sortable = [
        'id',
        'title',
        'description',
        'released_at',
        'created_at',
        'updated_at'
    ];

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

    /**
     * @return BelongsToMany
     */
    public function directors(): BelongsToMany
    {
        return $this->belongsToMany(Director::class,'film_director')->withTimestamps();
    }
}
