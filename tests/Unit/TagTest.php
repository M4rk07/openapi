<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\ExternalDocumentation;
use Restz\OpenAPI\Models\Tag;

class TagTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_tag_model(): void
    {
        $tag = Tag::fromArray([
            'name' => 'foo',
            'description' => 'Example description',
            'externalDocs' => ['url' => 'http://example.com']
        ]);

        $this->assertEquals('foo', $tag->getName());
        $this->assertEquals('Example description', $tag->getDescription());
        $this->assertInstanceOf(ExternalDocumentation::class, $tag->getExternalDocs());
    }

    /**
     * @test
     */
    public function it_should_parse_tag_model_without_not_required_data(): void
    {
        $tag = Tag::fromArray([
            'name' => 'foo',
        ]);

        $this->assertEquals('foo', $tag->getName());
        $this->assertNull($tag->getDescription());
        $this->assertNull($tag->getExternalDocs());
    }

    /**
     * @test
     */
    public function it_should_not_parse_tag_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        Tag::fromArray([]);
    }
}
