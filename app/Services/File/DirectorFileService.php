<?php

namespace App\Services\File;

use App\Exceptions\GeneralException;
use App\Models\Director;
use App\Models\DirectorImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class DirectorFileService
 */
class DirectorFileService extends FileService
{
    private $directorId;

    /**
     * DirectorFileService constructor.
     * @param int $directorId
     */
    public function __construct(int $directorId)
    {
        $this->directorId = $directorId;
        parent::__construct();
    }

    /**
     * @param string $originalName
     * @return string
     */
    public function makeFileName(string $originalName): string
    {
        return $this->getDirectorNameS3SubDir() . '/' .uniqid().'/'. $originalName;
    }

    /**
     * @return string
     */
    public function getDirectorNameS3SubDir(): string
    {
        /**
         * @var $director Director
         */
        $director = Director::find($this->directorId);
        return strtolower($director->firstname . '-' . $director->lastname);
    }

    /**
     * @param string $fileName
     * @param int $fileSize
     * @param string $type
     * @return Builder|Model
     * @throws GeneralException
     */
    public function createDatabaseRecord(string $fileName, int $fileSize, string $type): Model|Builder
    {
        DB::beginTransaction();
        $directorImage = DirectorImage::query()->create(
            [
                'director_id' => $this->directorId,
                'url' => $fileName,
                'type' => $type,
                'file_size'=>$fileSize
            ]
        );
        if ($directorImage) {
            DB::commit();
            return $directorImage;
        }
        DB::rollBack();
        throw new GeneralException(__('exceptions.backend.access.director_images.create_error'));
    }
}
