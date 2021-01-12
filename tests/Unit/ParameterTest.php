<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\MediaType;
use Restz\OpenAPI\Models\Parameter;
use Restz\OpenAPI\Models\Schema;

class ParameterTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_parameter_model(): void
    {
        $parameter = Parameter::fromArray([
            'name' => 'foo',
            'in' => 'query',
            'description' => 'Example description',
            'required' => true,
            'deprecated' => true,
            'allowEmptyValue' => true,
            'style' => 'matrix',
            'explode' => true,
            'allowReserved' => true,
            'schema' => [],
            'content' => [
                'application/json' => []
            ]
        ]);

        $this->assertEquals('foo', $parameter->getName());
        $this->assertEquals('query', $parameter->getIn());
        $this->assertEquals('Example description', $parameter->getDescription());
        $this->assertTrue($parameter->isRequired());
        $this->assertTrue($parameter->isDeprecated());
        $this->assertTrue($parameter->isAllowEmptyValue());
        $this->assertTrue($parameter->isExplode());
        $this->assertTrue($parameter->isAllowReserved());
        $this->assertEquals('matrix', $parameter->getStyle());
        $this->assertInstanceOf(Schema::class, $parameter->getSchema());
        $this->assertCount(1, $parameter->getContent());
        $this->assertArrayHasKey('application/json', $parameter->getContent());
        $this->assertInstanceOf(MediaType::class, $parameter->getContent()['application/json']);
    }

    /**
     * @test
     */
    public function it_should_parse_parameter_model_without_not_required_data(): void
    {
        $parameter = Parameter::fromArray([
            'name' => 'foo',
            'in' => 'query',
        ]);

        $this->assertEquals('foo', $parameter->getName());
        $this->assertEquals('query', $parameter->getIn());
        $this->assertNull($parameter->getDescription());
        $this->assertFalse($parameter->isRequired());
        $this->assertFalse($parameter->isDeprecated());
        $this->assertFalse($parameter->isAllowEmptyValue());
        $this->assertFalse($parameter->isExplode());
        $this->assertFalse($parameter->isAllowReserved());
        $this->assertNull($parameter->getStyle());
        $this->assertNull($parameter->getSchema());
        $this->assertEmpty($parameter->getContent());
    }

    /**
     * @test
     */
    public function it_should_not_parse_parameter_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        Parameter::fromArray([]);
    }
}
