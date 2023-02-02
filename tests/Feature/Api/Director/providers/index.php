<?php
/**
 * Copyright © 2021 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */

return [
    'index' => [
        [
            'dataComment' => 'Success get user list',
            'request' => [],
            'response' => [],
            'responseType' => [
                'code' => 'integer',
                'status' => 'string',
                'message' => 'string',
                'result.0.firstName' => 'string',
                'result.0.lastName' => 'string',
                'result.0.birthday_at' => 'date',
                'result.0.createdAt' => 'integer',
                'result.0.updatedAt' => 'integer',
                '_meta.pagination.totalCount' => 'integer',
                '_meta.pagination.pageCount' => 'integer',
                '_meta.pagination.currentPage' => 'integer',
                '_meta.pagination.perPage' => 'integer',
            ]
        ],
    ]
];
