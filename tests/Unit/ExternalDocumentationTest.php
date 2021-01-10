<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\ExternalDocumentation;

class ExternalDocumentationTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_external_documentation_model(): void
    {
        $external_documentation = ExternalDocumentation::fromArray([
            'url' => 'http://example.com',
            'description' => 'Example description',
        ]);

        $this->assertEquals('http://example.com', $external_documentation->getUrl());
        $this->assertEquals('Example description', $external_documentation->getDescription());
    }

    /**
     * @test
     */
    public function it_should_parse_external_documentation_model_without_not_required_data(): void
    {
        $external_documentation = ExternalDocumentation::fromArray([
            'url' => 'http://example.com',
        ]);

        $this->assertEquals('http://example.com', $external_documentation->getUrl());
        $this->assertNull($external_documentation->getDescription());
    }

    /**
     * @test
     */
    public function it_should_not_parse_external_documentation_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        ExternalDocumentation::fromArray([]);
    }
}
