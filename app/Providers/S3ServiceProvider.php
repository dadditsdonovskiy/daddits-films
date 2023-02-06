<?php

namespace App\Providers;

use App\Services\S3\S3Facade;
use Aws\S3\S3Client;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

class S3ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(S3Facade::class, function () {
            $client = new S3Client(config('s3'));
            $adapter = new AwsS3Adapter($client, S3Facade::getBucket(), S3Facade::getPrefix());
            return new S3Facade(new Filesystem($adapter));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
