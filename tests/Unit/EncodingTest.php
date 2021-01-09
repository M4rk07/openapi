<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Models\Encoding;
use Restz\OpenAPI\Models\Header;

class EncodingTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_encoding_model(): void
    {
        $encoding = Encoding::fromArray([
            'contentType' => 'application/json',
            'headers' => [
                'x-custom-header' => [
                    'required' => false
                ],
            ],
            'style' => 'matrix',
            'explode' => true,
            'allowReserved' => true,
        ]);

        $this->assertEquals('application/json', $encoding->getContentType());
        $this->assertEquals('matrix', $encoding->getStyle());
        $this->assertTrue($encoding->isExplode());
        $this->assertTrue($encoding->isAllowReserved());

        $this->assertCount(1, $encoding->getHeaders());
        $this->assertArrayHasKey('x-custom-header', $encoding->getHeaders());
        $this->assertInstanceOf(Header::class, $encoding->getHeaders()['x-custom-header']);
    }

    /**
     * @test
     */
    public function it_should_parse_encoding_model_without_not_required_data(): void
    {
        $encoding = Encoding::fromArray([]);

        $this->assertNull($encoding->getContentType());
        $this->assertNull($encoding->getStyle());
        $this->assertFalse($encoding->isExplode());
        $this->assertFalse($encoding->isAllowReserved());
        $this->assertEmpty($encoding->getHeaders());
    }
}
