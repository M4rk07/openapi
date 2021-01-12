<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Models\Discriminator;
use Restz\OpenAPI\Models\ExternalDocumentation;
use Restz\OpenAPI\Models\Schema;

class SchemaTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_schema_model(): void
    {
        $schema = Schema::fromArray([
            'nullable' => true,
            'readOnly' => true,
            'writeOnly' => true,
            'deprecated' => true,
            'discriminator' => ['propertyName' => 'foo'],
            'externalDocs' => ['url' => 'http://example.com'],
            'example' => ['Some example']
        ]);

        $this->assertTrue($schema->isNullable());
        $this->assertTrue($schema->isReadOnly());
        $this->assertTrue($schema->isWriteOnly());
        $this->assertTrue($schema->isDeprecated());
        $this->assertInstanceOf(Discriminator::class, $schema->getDiscriminator());
        $this->assertInstanceOf(ExternalDocumentation::class, $schema->getExternalDocs());
        $this->assertCount(1, $schema->getExample());
        $this->assertEquals('Some example', $schema->getExample()[0]);
    }

    /**
     * @test
     */
    public function it_should_parse_schema_model_without_not_required_data(): void
    {
        $schema = Schema::fromArray([]);

        $this->assertFalse($schema->isNullable());
        $this->assertFalse($schema->isReadOnly());
        $this->assertFalse($schema->isWriteOnly());
        $this->assertFalse($schema->isDeprecated());
        $this->assertNull($schema->getDiscriminator());
        $this->assertNull($schema->getExternalDocs());
        $this->assertEmpty($schema->getExample());
    }
}
