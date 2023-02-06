<?php

namespace Tests\Feature\Api\Director;

use Tests\ApiTestCase;
use Database\Seeders\DirectorsTableSeeder;
use Tests\ProviderDataTrait;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * Class IndexTest
 */
class IndexTest extends ApiTestCase
{
    use ProviderDataTrait;

    public function getMethod():string
    {
        return self::METHOD_GET;
    }

    /**
     * Url of method that will be test
     * @return string
     */
    protected function getUrl(): string
    {
        return '/directors';
    }

    /**
     * @throws \Exception
     */
    public function testGetDirectorListSuccess()
    {
        $this->seed(DirectorsTableSeeder::class);
        $response = $this->send($this->getMethod(), $this->getUrl());
        $response->assertSuccessful();
        $response        ->assertJsonFragment([
            'firstname' => 'Woody',
        ]);
        $response->assertJsonStructure([
            'resource_data' => [
                '*' => [
                    'id',
                    'firstname',
                    'lastname',
                    'birthday_date',
                ]
            ]
        ]);
    }
}
