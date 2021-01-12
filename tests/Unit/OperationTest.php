<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\ExternalDocumentation;
use Restz\OpenAPI\Models\Operation;
use Restz\OpenAPI\Models\Parameter;
use Restz\OpenAPI\Models\RequestBody;
use Restz\OpenAPI\Models\Response;
use Restz\OpenAPI\Models\SecurityRequirement;
use Restz\OpenAPI\Models\Server;

class OperationTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_operation_model(): void
    {
        $operation = Operation::fromArray([
            'tags' => ['foo'],
            'summary' => 'Example summary',
            'description' => 'Example description',
            'operationId' => 'getArticles',
            'deprecated' => true,
            'externalDocs' => ['url' => 'http://example.com'],
            'parameters' => [
                ['name' => 'foo', 'in' => 'query'],
            ],
            'requestBody' => [
                'content' => []
            ],
            'responses' => [
                ['description' => 'Example response description']
            ],
            'security' => [
                []
            ],
            'servers' => [
                ['url' => 'http://example.com']
            ]
        ]);

        $this->assertCount(1, $operation->getTags());
        $this->assertEquals('foo', $operation->getTags()[0]);
        $this->assertEquals('Example summary', $operation->getSummary());
        $this->assertEquals('Example description', $operation->getDescription());
        $this->assertEquals('getArticles', $operation->getOperationId());
        $this->assertInstanceOf(ExternalDocumentation::class, $operation->getExternalDocs());
        $this->assertCount(1, $operation->getParameters());
        $this->assertInstanceOf(Parameter::class, $operation->getParameters()[0]);
        $this->assertInstanceOf(RequestBody::class, $operation->getRequestBody());
        $this->assertCount(1, $operation->getResponses());
        $this->assertInstanceOf(Response::class, $operation->getResponses()[0]);
        $this->assertCount(1, $operation->getSecurity());
        $this->assertInstanceOf(SecurityRequirement::class, $operation->getSecurity()[0]);
        $this->assertCount(1, $operation->getServers());
        $this->assertInstanceOf(Server::class, $operation->getServers()[0]);
    }

    /**
     * @test
     */
    public function it_should_parse_operation_model_without_not_required_data(): void
    {
        $operation = Operation::fromArray([
            'responses' => [
                ['description' => 'Example response description']
            ],
        ]);

        $this->assertEmpty($operation->getTags());
        $this->assertNull($operation->getSummary());
        $this->assertNull($operation->getDescription());
        $this->assertNull($operation->getOperationId());
        $this->assertNull($operation->getExternalDocs());
        $this->assertEmpty($operation->getParameters());
        $this->assertNull($operation->getRequestBody());
        $this->assertCount(1, $operation->getResponses());
        $this->assertInstanceOf(Response::class, $operation->getResponses()[0]);
        $this->assertEmpty($operation->getSecurity());
        $this->assertEmpty($operation->getServers());
    }

    /**
     * @test
     */
    public function it_should_not_parse_operation_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        Operation::fromArray([]);
    }
}
