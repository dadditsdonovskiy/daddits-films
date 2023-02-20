<?php

namespace App\Helpers;

/**
 * Class CountriesIndexView
 */
class CountriesIndexView
{
    public static $columns = [
        'id' => [
            'id' => 'id',
            'class' => 'director_id form-control',
            'placeholder' => 'Id',
            'name' => 'id',
            'styles' => 'width:3%'
        ],
        'name' => [
            'id' => 'name',
            'class' => 'country_name form-control',
            'placeholder' => 'Country name',
            'name' => 'name',
            'styles' => 'width:10%'
        ],
        'created_at' => [
            'id' => 'created_at',
            'class' => 'director_created_at form-control',
            'placeholder' => 'Created at',
            'name' => 'created_at',
            'styles' => 'width:10%',
        ],
        'updated_at' => [
            'id' => 'updated_at',
            'class' => 'director_updated_at form-control',
            'placeholder' => 'Updated at',
            'name' => 'updated_at',
            'styles' => 'width:10%'
        ],
    ];
}
