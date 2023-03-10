<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kyslik\ColumnSortable\Sortable;

/**
 * Class Director
 * @property string  $firstname
 * @property string $lastname
 * @method static Builder|self byOrder(string $defaultOrder, string $value, ?string $fieldName)
 */
class Director extends Model
{
    use HasFactory, Sortable, Filterable;

    protected $fillable = ['firstname', 'lastname', 'birthday_date'];

    public $sortable = [
        'id',
        'firstname',
        'lastname',
        'birthday_date',
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
     * @return string
     */
    public static function getTableName(): string
    {
        return (new self())->getTable();
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    /**
     * @return BelongsToMany
     */
    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class,'film_director')->withTimestamps();
    }
}
