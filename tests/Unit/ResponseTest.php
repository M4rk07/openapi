<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\Header;
use Restz\OpenAPI\Models\Link;
use Restz\OpenAPI\Models\MediaType;
use Restz\OpenAPI\Models\Response;

class ResponseTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_response_model(): void
    {
        $response = Response::fromArray([
            'description' => 'Example description',
            'headers' => [
                []
            ],
            'content' => [
                []
            ],
            'links' => [
                []
            ]
        ]);

        $this->assertEquals('Example description', $response->getDescription());
        $this->assertCount(1, $response->getHeaders());
        $this->assertInstanceOf(Header::class, $response->getHeaders()[0]);
        $this->assertCount(1, $response->getContent());
        $this->assertInstanceOf(MediaType::class, $response->getContent()[0]);
        $this->assertCount(1, $response->getLinks());
        $this->assertInstanceOf(Link::class, $response->getLinks()[0]);
    }

    /**
     * @test
     */
    public function it_should_parse_response_model_without_not_required_data(): void
    {
        $response = Response::fromArray([
            'description' => 'Example description',
        ]);

        $this->assertEquals('Example description', $response->getDescription());
        $this->assertEmpty($response->getHeaders());
        $this->assertEmpty($response->getContent());
        $this->assertEmpty($response->getLinks());
    }

    /**
     * @test
     */
    public function it_should_not_parse_response_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        Response::fromArray([]);
    }
}
