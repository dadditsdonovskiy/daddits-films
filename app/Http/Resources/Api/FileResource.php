<?php
namespace App\Http\Resources\Api;

use App\Models\DirectorImage;
use App\Services\File\DirectorFileService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class FileResource
 */
class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        /** @var DirectorImage $file */
        $file = $this;
        return [
            'id'    => $file->id,
            'url' => (new DirectorFileService($file->director_id))->getBucketUrlLink($file->url),
            'filesize' => intval($file->file_size),
            'createdAt' => $file->created_at,
            'updatedAt' => $file->updated_at,
        ];
    }
}
