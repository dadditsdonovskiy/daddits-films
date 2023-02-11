@extends('layouts.master')
@section('content')
    <div class="mt-5">
        @php
            $gridData = [
                'dataProvider' => $dataProvider,
                'title' => false,
                'useFilters' => false,
                'columnFields' => [
                    'id',
                            [
            'attribute' => 'firstname',
                'filter' => [
                    'class' => Itstructure\GridView\Filters\DropdownFilter::class,
                    'data' => ['key' => 'value', 'key' => 'value'] // Array keys are for html <option> tag values, array values are for titles.
                ]
        ],
                    'lastname',
                    'birthdate',
                    'created_at',
                    [
                    'label' => 'Actions', // Optional
                    'class' => Itstructure\GridView\Columns\ActionColumn::class, // Required
                    'actionTypes' => [ // Required
                        'view',
                        'edit' => function ($data) {
                            return '/admin/pages/' . $data->id . '/edit';
                        },
                    [
                    'class' => Itstructure\GridView\Actions\Delete::class, // Required
                    'url' => function ($data) { // Optional
                        return '/admin/pages/' . $data->id . '/delete';
                    },
                    'htmlAttributes' => [ // Optional
                        'target' => '_blank',
                        'style' => 'color: yellow; font-size: 16px;',
                        'onclick' => 'return window.confirm("Are you sure you want to delete?");'
                    ]
                ]
            ]
        ],

                ]
            ];
        @endphp
        @gridView($gridData)
    </div>
@stop

