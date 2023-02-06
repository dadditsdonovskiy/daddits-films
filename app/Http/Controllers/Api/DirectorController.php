<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Director\DirectorCreateRequest;
use App\Http\Requests\Api\Director\FileUpload;
use App\Http\Resources\Api\FileResource;
use App\Models\Director;
use App\Http\Requests\Api\Director\DirectorListRequest;
use App\Http\Resources\Api\DirectorResource;
use App\Services\Director\CreateDirectorService;
use App\Services\File\DirectorFileService;
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

    /**
     * @param DirectorCreateRequest $directorCreate
     * @param CreateDirectorService $createDirectorService
     * @return DirectorResource
     * @throws GeneralException
     */
    public function create(
        DirectorCreateRequest $directorCreate,
        CreateDirectorService $createDirectorService
    ): DirectorResource
    {
        $director = $createDirectorService->create($directorCreate->all());

        return new DirectorResource($director);
    }

    /**
     * @param int $directorId
     * @param FileUpload $fileUpload
     * @return FileResource
     */
    public function uploadImage(int $directorId, FileUpload $fileUpload): FileResource
    {
        $service = new DirectorFileService($directorId);
        $request = $fileUpload->all();
        $newDirectorModel = $service->upload($request);
        return new FileResource($newDirectorModel);
    }
}
