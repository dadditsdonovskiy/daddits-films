<?php

namespace App\Services\Film;

use App\Interfaces\SearchInterface;
use App\Models\Film;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class SearchFilmService
 */
class SearchFilmService implements SearchInterface
{
    private $model;

    /**
     * SearchDirectorService constructor.
     */
    public function __construct()
    {
        $this->model = Film::sortable();
    }

    /**
     * @param array $params
     * @return Builder
     */
    public function getQuery(array $params): Builder
    {
        $wherePart = [];
        foreach ($params as $key => $param) {
            //if param not passed, then don't use in the query
            if ($param) {
                $wherePart[] = [$key, 'LIKE', '%' . $param . '%'];
            }
        }

        return $this->model->where($wherePart);
    }
}
