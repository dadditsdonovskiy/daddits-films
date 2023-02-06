<?php
/**
 * Copyright © 2021 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
declare(strict_types=1);

namespace App\Services\File;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ConstantHelper;
use Illuminate\Http\UploadedFile;
use App\Services\Image\ImageService;

/**
 * Class FileService
 */
abstract class FileService
{
    private $disk;

    /**
     * @param string $disk
     */
    public function __construct(string $disk = 's3')
    {
        $this->disk = $disk;
    }

    /**
     * @param string $filePath
     * @param string $fileName
     * @param array $options
     * @return bool
     */
    public function uploadFile(string $filePath, string $fileName, array $options = []): bool
    {
        $storage = Storage::disk($this->disk);
        return $storage->put($fileName, file_get_contents($filePath), $options);
    }

    /**
     * @param string $filePath
     * @param string $fileName
     * @return bool
     */
    public function readFile(string $filePath, string $fileName): bool
    {
        $content = Storage::disk($this->disk)->get($fileName);
        file_put_contents($filePath, $content);
        return is_writable($filePath);
    }

    /**
     * @param string $originalName
     * @return string
     */
    abstract public function makeFileName(string $originalName): string;

    /**
     * @param array $data
     * @return Model|null
     */
    public function upload(array $data): ?Model
    {
        $fileModel = null;
        if (isset($data['file']) && $data['file'] instanceof UploadedFile) {
            $file = $data['file'];
            $fileSize = filesize($file->path());
            $fileName = $this->makeFileName($file->getClientOriginalName());

            if ($this->uploadFile($file->path(), $fileName)) {
                $modifiedFilePath = $this->resizeImage($file);
                if (is_writable($modifiedFilePath)) {
                    $fileNameModified = $this->makeFileName($file->getClientOriginalName());
                    $this->uploadFile($modifiedFilePath, $fileNameModified);
                    unlink($modifiedFilePath);
                }

                $type = $data['type'];
                $fileModel = $this->createDatabaseRecord($fileName, $fileSize, $type);

            }
            if (is_writable($file->path())) {
                unlink($file->path());
            }
        }

        return $fileModel;
    }

    /**
     * @param $file
     * @return string|null
     */
    private function resizeImage($file): ?string
    {
        $imageService = new ImageService;
        return $imageService->resizeImage(
            $file->path(),
            ConstantHelper::THUMB_IMAGE_WIDTH_200,
            ConstantHelper::THUMB_IMAGE_HEIGHT_200
        );
    }

    abstract function createDatabaseRecord(string $fileName, int $fileSize, string $typeId);

    /**
     * @param string $value
     * @return string|null
     */
    public function getBucketUrlLink(string $value): ?string
    {
        return ImageService::getLink($value);
    }
}
