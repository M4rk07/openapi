<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\MediaType;
use Restz\OpenAPI\Models\RequestBody;

class RequestBodyTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_request_body_model(): void
    {
        $request_body = RequestBody::fromArray([
            'required' => true,
            'content' => [
                []
            ],
            'description' => 'Example description'
        ]);

        $this->assertTrue($request_body->isRequired());
        $this->assertCount(1, $request_body->getContent());
        $this->assertInstanceOf(MediaType::class, $request_body->getContent()[0]);
        $this->assertEquals('Example description', $request_body->getDescription());
    }

    /**
     * @test
     */
    public function it_should_parse_request_body_model_without_not_required_data(): void
    {
        $request_body = RequestBody::fromArray([
            'content' => [
                []
            ],
        ]);

        $this->assertFalse($request_body->isRequired());
        $this->assertCount(1, $request_body->getContent());
        $this->assertInstanceOf(MediaType::class, $request_body->getContent()[0]);
        $this->assertNull($request_body->getDescription());
    }

    /**
     * @test
     */
    public function it_should_not_parse_request_body_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        RequestBody::fromArray([]);
    }
}
