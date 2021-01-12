<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\ExternalDocumentation;
use Restz\OpenAPI\Models\Info;
use Restz\OpenAPI\Models\OpenAPI;
use Restz\OpenAPI\Models\PathItem;
use Restz\OpenAPI\Models\SecurityRequirement;
use Restz\OpenAPI\Models\Server;
use Restz\OpenAPI\Models\Tag;

class OpenAPITest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_openapi_model(): void
    {
        $openapi = OpenAPI::fromArray([
            'openapi' => '3',
            'info' => [
                'title' => 'Great API',
                'version' => '1',
            ],
            'servers' => [
                ['url' => 'http://example.com'],
            ],
            'paths' => [
                '/articles' => [],
            ],
            'security' => [
                []
            ],
            'tags' => [
                ['name' => 'foo'],
            ],
            'externalDocs' => ['url' => 'http://example.com'],
        ]);

        $this->assertEquals('3', $openapi->getOpenapi());
        $this->assertInstanceOf(Info::class, $openapi->getInfo());
        $this->assertCount(1, $openapi->getServers());
        $this->assertInstanceOf(Server::class, $openapi->getServers()[0]);
        $this->assertCount(1, $openapi->getPaths());
        $this->assertArrayHasKey('/articles', $openapi->getPaths());
        $this->assertInstanceOf(PathItem::class, $openapi->getPaths()['/articles']);
        $this->assertCount(1, $openapi->getSecurity());
        $this->assertInstanceOf(SecurityRequirement::class, $openapi->getSecurity()[0]);
        $this->assertCount(1, $openapi->getTags());
        $this->assertInstanceOf(Tag::class, $openapi->getTags()[0]);
        $this->assertInstanceOf(ExternalDocumentation::class, $openapi->getExternalDocs());
    }

    /**
     * @test
     */
    public function it_should_parse_openapi_model_without_not_required_data(): void
    {
        $openapi = OpenAPI::fromArray([
            'openapi' => '3',
            'info' => [
                'title' => 'Great API',
                'version' => '1',
            ],
            'paths' => [],
        ]);

        $this->assertEquals('3', $openapi->getOpenapi());
        $this->assertInstanceOf(Info::class, $openapi->getInfo());
        $this->assertEmpty($openapi->getServers());
        $this->assertEmpty($openapi->getPaths());
        $this->assertEmpty($openapi->getSecurity());
        $this->assertEmpty($openapi->getTags());
        $this->assertNull($openapi->getExternalDocs());
    }

    /**
     * @test
     */
    public function it_should_not_parse_openapi_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        OpenAPI::fromArray([]);
    }
}
