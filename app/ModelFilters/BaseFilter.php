<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Arr;

/**
 * Class BaseFilter
 *
 * @package App\ModelFilters
 */
abstract class BaseFilter extends ModelFilter
{
    /**
     * Get input to pass to a related Model's Filter.
     * Overridden because of a bug found in library files.
     * Original library method does not accept "0" as a correct filter value in the related filter
     * @param $related
     * @return array
     */
    public function getRelatedFilterInput($related): array
    {
        $output = [];

        if (array_key_exists($related, $this->relations)) {
            foreach ((array) $this->relations[$related] as $alias => $name) {
                // If the alias is a string that is what we grab from the input
                // Then use the name for the output so we can alias relations

                $value = Arr::get($this->input, is_string($alias) ? $alias : $name);
                if (!is_null($value) && $value !== '') {
                    $output[$name] = $value;
                }
            }
        }

        return $output;
    }
}
