<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Http\Requests\Api\Director\DirectorListRequest;
use App\Http\Resources\Api\DirectorResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class DirectorController
 */
class DirectorController extends Controller
{
    /**
     * @param DirectorListRequest $directorListRequest
     * @return AnonymousResourceCollection
     */
    public function index(DirectorListRequest $directorListRequest): AnonymousResourceCollection
    {
        return DirectorResource::collection(
            Director::filter($directorListRequest->all())
                ->byOrder(
                    'created_at',
                    $directorListRequest->getSortOrder(),
                    $directorListRequest->getSortField()
                )
                ->paginate($directorListRequest->getPerPage())
        );
    }
}
