<?php

namespace Tests\Feature\Api\Director;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\ApiTestCase;
use Tests\ProviderDataTrait;
use Tests\PermissionTestTrait;

/**
 * Class CreateDirectorTest
 */
class CreateDirectorTest extends ApiTestCase
{
    use ProviderDataTrait, PermissionTestTrait;

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return self::METHOD_POST;
    }

    /**
     * Url of method that will be tested
     *
     * @return string
     */
    protected function getUrl(): string
    {
        return '/directors';
    }

    /** @test */
    public function testCreateDirectorSuccess()
    {
        foreach ($this->getProviderData('success') as $data) {
            $response = $this->send($this->getMethod(), $this->getUrl(), $data['request']);
            $response->assertStatus(201)
                ->assertJson(fn(AssertableJson $json) => $json->whereAllType($data['responseType']));

            foreach ($data['response'] as $dataResponse) {
                $response->assertJsonFragment($dataResponse);
            }

            $this->assertDatabaseHas('directors', ['firstname' => $data['request']['firstname']]);
        }
    }

    /**
     * @throws \Exception
     */
    public function testValidation()
    {
        foreach ($this->getProviderData('validation') as $data) {
            $response = $this->send($this->getMethod(), $this->getUrl(), $data['request']);
            $response->assertStatus(422)
                ->assertJsonFragment($data['response']);
        }
    }
}
