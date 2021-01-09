<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\Discriminator;

class DiscriminatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_discriminator_model(): void
    {
        $discriminator = Discriminator::fromArray([
            'propertyName' => 'foo',
            'mapping' => ['baz', 'bar'],
        ]);

        $this->assertEquals('foo', $discriminator->getPropertyName());
        $this->assertEquals(['baz', 'bar'], $discriminator->getMapping());
    }

    /**
     * @test
     */
    public function it_should_parse_discriminator_model_without_not_required_data(): void
    {
        $discriminator = Discriminator::fromArray([
            'propertyName' => 'foo',
        ]);

        $this->assertEmpty($discriminator->getMapping());
    }

    /**
     * @test
     */
    public function it_should_not_parse_discriminator_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        Discriminator::fromArray([]);
    }
}
