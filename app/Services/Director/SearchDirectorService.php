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
        $searchParams = [];
        $searchParams['firstname'] = $params['firstname'];
        $searchParams['lastname'] = $params['lastname'];
        $searchParams['id'] = $params['id'];
        foreach ($searchParams as $key => $param) {
            //if param not passed, then don't use in the query
            if ($param) {
                $wherePart[] = [$key, 'LIKE', '%' . $param . '%'];
            }
        }
        if ($wherePart) {
            $this->model->where($wherePart);
        }
        //for searching my film count
        if ($params['filmsCount']) {
            $this->model->withCount('films')->having('films_count', '=', $params['filmsCount']);
        }
        return $this->model;
    }
}
