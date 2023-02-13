<?php

namespace App\Filters\Director;

use App\Filters\QueryFilters;
use Illuminate\Http\Request;

class DirectorFilter extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function id($term)
    {
        return $this->builder->where('director.id', $term);
    }

    public function firstname($term)
    {
        return $this->builder->where('director.firstname', 'LIKE', $term);
    }


    public function timestampRange($term)
    {
        return $this->builder->where('director.created_at', '>=', $term[0])
            ->where('director.created_at', '<=', $term[1]);
    }

    public function sort($term)
    {
        $column = $term[0];
        $type = ($term[1] == 'true') ? 'asc' : 'desc';
        return $this->builder->when($column != 'null', function ($query) use ($column, $type) {
            $query->orderBy($column, $type);
        });
    }
}
