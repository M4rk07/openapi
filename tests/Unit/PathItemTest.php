<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Models\Operation;
use Restz\OpenAPI\Models\Parameter;
use Restz\OpenAPI\Models\PathItem;
use Restz\OpenAPI\Models\Server;

class PathItemTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_path_item_model(): void
    {
        $path_item = PathItem::fromArray([
            'summary' => 'Example summary',
            'description' => 'Example description',
            'get' => ['responses' => []],
            'put' => ['responses' => []],
            'post' => ['responses' => []],
            'delete' => ['responses' => []],
            'options' => ['responses' => []],
            'head' => ['responses' => []],
            'patch' => ['responses' => []],
            'trace' => ['responses' => []],
            'servers' => [
                ['url' => 'http://example.com']
            ],
            'parameters' => [
                ['name' => 'foo', 'in' => 'query']
            ]
        ]);

        $this->assertEquals('Example summary', $path_item->getSummary());
        $this->assertEquals('Example description', $path_item->getDescription());
        $this->assertInstanceOf(Operation::class, $path_item->getGet());
        $this->assertInstanceOf(Operation::class, $path_item->getPut());
        $this->assertInstanceOf(Operation::class, $path_item->getPost());
        $this->assertInstanceOf(Operation::class, $path_item->getDelete());
        $this->assertInstanceOf(Operation::class, $path_item->getOptions());
        $this->assertInstanceOf(Operation::class, $path_item->getHead());
        $this->assertInstanceOf(Operation::class, $path_item->getPatch());
        $this->assertInstanceOf(Operation::class, $path_item->getTrace());
        $this->assertCount(1, $path_item->getServers());
        $this->assertInstanceOf(Server::class, $path_item->getServers()[0]);
        $this->assertCount(1, $path_item->getParameters());
        $this->assertInstanceOf(Parameter::class, $path_item->getParameters()[0]);
    }

    /**
     * @test
     */
    public function it_should_parse_path_item_model_without_not_required_data(): void
    {
        $path_item = PathItem::fromArray([]);

        $this->assertNull($path_item->getSummary());
        $this->assertNull($path_item->getDescription());
        $this->assertNull($path_item->getGet());
        $this->assertNull($path_item->getPut());
        $this->assertNull($path_item->getPost());
        $this->assertNull($path_item->getDelete());
        $this->assertNull($path_item->getOptions());
        $this->assertNull($path_item->getHead());
        $this->assertNull($path_item->getPatch());
        $this->assertNull($path_item->getTrace());
        $this->assertEmpty($path_item->getServers());
        $this->assertEmpty($path_item->getParameters());
    }
}
