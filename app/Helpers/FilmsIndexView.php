<?php

namespace App\Helpers;

/**
 * Class FilmsIndexView
 */
class FilmsIndexView
{
    public static $columns = [
        'id' => [
            'id' => 'id',
            'class' => 'film_id form-control',
            'placeholder' => 'Id',
            'name' => 'id',
            'styles' => 'width:3%'
        ],
        'title' => [
            'id' => 'title',
            'class' => 'film_title form-control',
            'placeholder' => 'Title',
            'name' => 'title',
            'styles' => 'width:10%'
        ],
        'description' => [
            'id' => 'description',
            'class' => 'film-description form-control',
            'placeholder' => 'Description',
            'name' => 'description',
            'styles' => 'width:10%'
        ],
        'released_at' => [
            'id' => 'released_at',
            'class' => 'film_released_at form-control',
            'placeholder' => 'Released at',
            'name' => 'released_at',
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
