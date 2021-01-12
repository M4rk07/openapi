<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\Server;
use Restz\OpenAPI\Models\ServerVariable;

class ServerTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_server_model(): void
    {
        $server = Server::fromArray([
            'url' => 'http://example.com',
            'description' => 'Example description',
            'variables' => [
                'username' => ['default' => 'foo']
            ]
        ]);

        $this->assertEquals('http://example.com', $server->getUrl());
        $this->assertEquals('Example description', $server->getDescription());
        $this->assertCount(1, $server->getVariables());
        $this->assertArrayHasKey('username', $server->getVariables());
        $this->assertInstanceOf(ServerVariable::class, $server->getVariables()['username']);
    }

    /**
     * @test
     */
    public function it_should_parse_server_model_without_not_required_data(): void
    {
        $server = Server::fromArray([
            'url' => 'http://example.com',
        ]);

        $this->assertEquals('http://example.com', $server->getUrl());
        $this->assertNull($server->getDescription());
        $this->assertEmpty($server->getVariables());
    }

    /**
     * @test
     */
    public function it_should_not_parse_server_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        Server::fromArray([]);
    }
}
