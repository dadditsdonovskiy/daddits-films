<?php

namespace App\Helpers;

/**
 * Class DirectorsIndexView
 */
class DirectorsIndexView
{
    public static $columns = [
        'id' => [
            'id' => 'id',
            'class' => 'director_id form-control',
            'placeholder' => 'Id',
            'name' => 'id',
            'styles' => 'width:3%'
        ],
        'firstname' => [
            'id' => 'firstname',
            'class' => 'director_firstname form-control',
            'placeholder' => 'Firstname',
            'name' => 'firstname',
            'styles' => 'width:10%'
        ],
        'lastname' => [
            'id' => 'Lastname',
            'class' => 'director_lastname form-control',
            'placeholder' => 'Lastname',
            'name' => 'lastname',
            'styles' => 'width:10%'
        ],
        'birthday_date' => [
            'id' => 'birthday_date',
            'class' => 'director_birthday_date form-control',
            'placeholder' => 'Birthday',
            'name' => 'birthday_date',
            'styles' => 'width:10%'
        ],
        'filmsCount' => [
            'id' => 'filmsCount',
            'class' => 'filmsCount form-control',
            'placeholder' => 'Films count',
            'name' => 'filmsCount',
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
