<?php

namespace App\Imdb;

use Imdb\Title;

/**
 * Class ImdbTitle
 */
class ImdbTitle extends Title
{
    public function getJson()
    {
        return $this->jsonLD();
    }
}
