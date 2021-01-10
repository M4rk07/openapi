<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Models\Encoding;
use Restz\OpenAPI\Models\MediaType;
use Restz\OpenAPI\Models\Schema;

class MediaTypeTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_media_type_model(): void
    {
        $media_type = MediaType::fromArray([
            'schema' => [],
            'encoding' => [
                'historyMetadata' => []
            ],
        ]);

        $this->assertInstanceOf(Schema::class, $media_type->getSchema());
        $this->assertCount(1, $media_type->getEncoding());
        $this->assertArrayHasKey('historyMetadata', $media_type->getEncoding());
        $this->assertInstanceOf(Encoding::class, $media_type->getEncoding()['historyMetadata']);
    }

    /**
     * @test
     */
    public function it_should_parse_media_type_model_without_not_required_data(): void
    {
        $media_type = MediaType::fromArray([]);

        $this->assertNull($media_type->getSchema());
        $this->assertEmpty($media_type->getEncoding());
    }
}
