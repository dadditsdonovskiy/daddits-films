<?php


namespace App\Services\Director;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Director;
use App\Filters\Director\DirectorFilter;
use App\Filters\Director\DirectorSearch;

class DirectorService
{
    public function getDirectorsListQuery(DirectorFilter $filters, DirectorSearch $search): Builder
    {
        $query = Director::select(
            'directors.*'
        );
        $filtered = $query->filter($filters);
        $co = $filtered->search($search);
        return $filtered->search($search);
    }
}
