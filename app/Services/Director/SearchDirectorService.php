<?php

namespace App\Services\Director;

use App\Interfaces\SearchInterface;
use App\Models\Director;
use Illuminate\Database\Eloquent\Builder;

class SearchDirectorService implements SearchInterface
{
    private $model;

    /**
     * SearchDirectorService constructor.
     */
    public function __construct()
    {
        $this->model = Director::sortable();
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
