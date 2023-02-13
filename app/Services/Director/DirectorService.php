<?php


namespace App\Services\Director;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Director;
use App\Filters\Director\DirectorFilter;
use App\Filters\Director\DirectorSearch;

class DirectorService
{
    public function geDirectorsListQuery(DirectorFilter $filters, DirectorSearch $search): Builder
    {
        $query = Director::select(
            'directors.*'
        );


        return $query->filter($filters)->search($search);
    }

}
