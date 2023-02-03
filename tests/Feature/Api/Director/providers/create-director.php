<?php
/**
 * Copyright © 2021 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */

use App\Models\Auth\User;

$user = User::factory(['email' => 'johndoe@nosend.net', 'email_verified_at' => time()])->create();
$directorTestFirstName = 'Director firstname';
$directorTestLastName = 'Director lastname';
$directorTestBirthDate = '1940-01-01';
$responseType = [
    'resource_data.firstname' => 'string',
    'resource_data.lastname' => 'string',
    'resource_data.created_at' => 'string',
    'resource_data.updated_at' => 'string',
    'resource_data.birthday_date' => 'string',
];

return [
    'success' => [
        [
            'dataComment' => 'Success create director',
            'request' => [
                'firstname' => $directorTestFirstName,
                'lastname' => $directorTestLastName,
                'birthdayDate' => $directorTestBirthDate,
            ],
            'response' => [
                ['firstname' => $directorTestFirstName],
                ['lastname' => $directorTestLastName],
                ['birthday_date' => $directorTestBirthDate],

            ],
            'responseType' => $responseType
        ],
    ],
    'validation' => [
        [
            'dataComment' => 'Check create director with empty fields',
            'request' => [
            ],
            'response' => [
                'errors' => [
                    [
                        'field' => 'firstname',
                        'message' => 'Firstname cannot be blank.',
                    ],
                    [
                        'field' => 'lastname',
                        'message' => 'Lastname cannot be blank.',
                    ],
                    [
                        'field' => 'birthdayDate',
                        'message' => 'Birthday date cannot be blank.',
                    ],
                ]
            ]
        ],

    ]
];
