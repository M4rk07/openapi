<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\ServerVariable;

class ServerVariableTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_server_variable_model(): void
    {
        $server_variable = ServerVariable::fromArray([
            'enum' => ['foo'],
            'default' => 'foo',
            'description' => 'Example description'
        ]);

        $this->assertEquals('foo', $server_variable->getDefault());
        $this->assertEquals('Example description', $server_variable->getDescription());
        $this->assertCount(1, $server_variable->getEnum());
        $this->assertEquals('foo', $server_variable->getEnum()[0]);
    }

    /**
     * @test
     */
    public function it_should_parse_server_variable_model_without_not_required_data(): void
    {
        $server_variable = ServerVariable::fromArray([
            'default' => 'foo',
        ]);

        $this->assertEquals('foo', $server_variable->getDefault());
        $this->assertNull($server_variable->getDescription());
        $this->assertEmpty($server_variable->getEnum());
    }

    /**
     * @test
     */
    public function it_should_not_parse_server_variable_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        ServerVariable::fromArray([]);
    }
}
