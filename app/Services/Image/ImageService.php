<?php
/**
 * Copyright © 2021 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
declare(strict_types=1);

namespace App\Services\Image;

use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\ImageException;

class ImageService
{

    public const FILE_TYPE_PNG = 'png';
    public const FILE_TYPE_JPG = 'jpg';
    public const FILE_TYPE_WEBP = 'webp';

    private $tempDirectory;

    public function __construct()
    {
        $this->tempDirectory = base_path().DIRECTORY_SEPARATOR.config('app.imageTemporaryDirectory');
    }

    /**
     * @param string $path
     * @return bool
     */
    public function setTemporaryDirectory(string $path): bool
    {
        if (is_readable(base_path().DIRECTORY_SEPARATOR.$path)) {
            $this->tempDirectory = base_path().DIRECTORY_SEPARATOR.$path;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getTemporaryDirectory(): string
    {
        return $this->tempDirectory;
    }

    /**
     * @param string $filePath
     * @return string|null
     * @throws InvalidArgumentException
     */
    public function imageGetType(string $filePath):? string
    {
        if (!file_exists($filePath)) {
            throw new InvalidArgumentException('File "'.$filePath.'" not found.');
        }
        switch (strtolower(mime_content_type($filePath))) {
            case 'image/jpeg':
            case 'image/jpg':
            case 'image/pjpeg':
                return self::FILE_TYPE_JPG;
                break;
            case 'image/png':
                return self::FILE_TYPE_PNG;
                break;
            case 'image/webp':
                return self::FILE_TYPE_WEBP;
                break;
            default:
                return null;
                break;
        }
    }

    /**
     * @param string $filePath
     * @param string $dirPath
     * @return string
     */
    public function makeTempFileName(string $filePath, string $dirPath = null): string
    {
        $ext = $this->imageGetType($filePath);
        if ($ext) {
            $ext = '.' . $ext;
        }
        if ($dirPath && !is_dir($dirPath)) {
            mkdir($dirPath, 0777, true);
        }
        return $dirPath ? '/' .$dirPath . '/' . uniqid() . $ext : uniqid() . $ext;
    }

    /**
     * @param string $filePath
     * @param int $width
     * @param int $height
     * @param string $dirPath
     * @return string|null
     */
    public function resizeImage(string $filePath, int $width, int $height, string $dirPath = null): ?string
    {
        $tempFilePath = $this->getTemporaryDirectory().DIRECTORY_SEPARATOR.$this->makeTempFileName($filePath, $dirPath);
        try {
            $canvas = Image::canvas($width, $height);
            $image  = Image::make($filePath)->resize(
                $width,
                $height,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            $canvas->insert($image, 'center');
            $canvas->save($tempFilePath);
            if (is_readable($tempFilePath)) {
                return $tempFilePath;
            }
        } catch (ImageException $ex) {
            if (is_writable($tempFilePath)) {
                unlink($tempFilePath);
            }
        }
        return null;
    }

    /**
     * @param string $filePath
     * @param string $fileName
     * @param array $options
     * @return bool
     */
    public function uploadImage(string $filePath, string $fileName, array $options = []): bool
    {
        return Storage::disk('s3')->put($fileName, file_get_contents($filePath), $options);
    }

    /**
     * @param string $filePath
     * @param string $alias
     * @return string
     */
    public function makeFileName(string $filePath, string $alias = null): string
    {
        $ext = $this->imageGetType($filePath);
        if ($ext) {
            $ext = '.' . $ext;
        }
        return $alias ? $alias . '/' . uniqid() . $ext : uniqid() . $ext;
    }

    /**
     * @param string $key
     * @return string
     */
    public static function getLink(string $key): string
    {
        $bucket = Config('filesystems.disks.s3.bucket');
        $region = Config('filesystems.disks.s3.region');
        $key = Config('filesystems.disks.s3.root', '')  . $key;

        return "https://{$bucket}.s3.$region.amazonaws.com/{$key}";
    }
}
