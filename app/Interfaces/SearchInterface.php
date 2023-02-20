<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;

/**
 * Interface SearchInterface
 */
interface SearchInterface
{
    /**
     * @param array $params
     * @return Builder
     */
    public function getQuery(array $params): Builder;
}
