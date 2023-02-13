<?php

namespace App\Filters\Director;

use App\Filters\QueryFilters;
use Illuminate\Http\Request;

class DirectorSearch extends QueryFilters
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function searchString($searchStr = '')
    {
        return $this->builder->when($searchStr, function ($query) use ($searchStr) {
            $query->where('directors.id', 'like', '%' . $searchStr . '%')
                ->orWhere('directors.firstname', 'like', '%' . $searchStr . '%');
        });
    }
}
