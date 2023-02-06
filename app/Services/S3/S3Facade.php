<?php
/**
 * Copyright © 2021 GBKSOFT. Web and Mobile Software Development.
 * See LICENSE.txt for license details.
 */
declare(strict_types=1);

namespace App\Services\S3;

use League\Flysystem\Config;
use League\Flysystem\Filesystem;
use League\Flysystem\Plugin\ForcedCopy;
use League\Flysystem\Plugin\ForcedRename;
use League\Flysystem\Plugin\GetWithMetadata;
use League\Flysystem\Plugin\ListFiles;
use League\Flysystem\Plugin\ListPaths;
use League\Flysystem\Plugin\ListWith;

/**
 * Class S3Facade
 *
 * @method array getWithMetadata(string $path, array $metadata)
 * @method bool  forceCopy(string $path, string $newpath)
 * @method bool  forceRename(string $path, string $newpath)
 * @method array listFiles(string $path = '', boolean $recursive = false)
 * @method array listPaths(string $path = '', boolean $recursive = false)
 * @method array listWith(array $keys = [], $directory = '', $recursive = false)
 * @method array|bool|null has(string $path)
 * @method array|false write(string $path, string $contents, Config $config)
 * @method array|false writeStream(string $path, resource $resource, Config $config)
 * @method array|false put(string $path, string $contents, Config $config)
 * @method array|false putStream(string $path, resource $resource, Config $config)
 * @method string readAndDelete(string $path)
 * @method array|false update(string $path, string $contents, Config $config)
 * @method array|false updateStream(string $path, resource $resource, Config $config)
 * @method string read(string $path)
 * @method resource readStream(string $path)
 * @method bool rename(string $path, string $newpath)
 * @method bool copy(string $path, string $newpath)
 * @method bool delete(string $path)
 * @method bool deleteDir(string $dirname)
 * @method bool createDir(string $dirname, array $config = [])
 * @method array listContents(string $directory = '', bool $recursive = false)
 * @method string getMimetype($path)
 * @method int getTimestamp($path)
 * @method string getVisibility($path)
 * @method bool setVisibility($path)
 * @method int getSize($path)
 * @method array|false getMetadata($path)
 * @package App\Services\S3
 */
class S3Facade
{
    public const DEFAULT_WRITE_CONFIG = ['ACL' => 'public-read'];

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var array
     */
    protected $defaultPlugins = [
        ListFiles::class,
        ForcedCopy::class,
        ForcedRename::class,
        GetWithMetadata::class,
        ListPaths::class,
        ListWith::class,
    ];

    /**
     * @var array
     */
    protected $clientPlugins = [

    ];

    /**
     * S3Facade constructor.
     */
    public function __construct($s3Filesystem)
    {
        $this->filesystem = $s3Filesystem;
        $this->registerPlugins();
    }

    /**
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call(string $method, array $arguments)
    {
        $callback = [$this->filesystem, $method];

        return call_user_func_array($callback, $arguments);
    }

    /**
     * @return void
     */
    private function registerPlugins(): void
    {
        $plugins = array_merge($this->defaultPlugins, $this->clientPlugins);

        foreach ($plugins as $plugin) {
            $this->filesystem->addPlugin(new $plugin);
        }
    }

    /**
     * @return string|null
     */
    public static function getBucket(): ?string
    {
        return Config('filesystems.disks.s3.bucket');
    }

    /**
     * @return string
     */
    public static function getPrefix(): string
    {
        return Config('filesystems.disks.s3.root', '');
    }
}
