<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Models\Link;
use Restz\OpenAPI\Models\Server;

class LinkTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_link_model(): void
    {
        $link = Link::fromArray([
            'operationRef' => 'getUserAddressRef',
            'operationId' => 'getUserAddressId',
            'description' => 'Example description',
            'requestBody' => 'address=someaddress',
            'server' => [
                'url' => 'http://example.com',
            ],
            'parameters' => [
                'address' => '$request.path.id',
            ],
        ]);

        $this->assertEquals('getUserAddressRef', $link->getOperationRef());
        $this->assertEquals('getUserAddressId', $link->getOperationId());
        $this->assertEquals('Example description', $link->getDescription());
        $this->assertEquals('address=someaddress', $link->getRequestBody());
        $this->assertInstanceOf(Server::class, $link->getServer());
        $this->assertCount(1, $link->getParameters());
        $this->assertArrayHasKey('address', $link->getParameters());
        $this->assertEquals('$request.path.id', $link->getParameters()['address']);
    }

    /**
     * @test
     */
    public function it_should_parse_link_model_without_not_required_data(): void
    {
        $link = Link::fromArray([]);

        $this->assertNull($link->getOperationRef());
        $this->assertNull($link->getOperationId());
        $this->assertNull($link->getDescription());
        $this->assertNull($link->getRequestBody());
        $this->assertNull($link->getServer());
        $this->assertEmpty($link->getParameters());
    }
}
