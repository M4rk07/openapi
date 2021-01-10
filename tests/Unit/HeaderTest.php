<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Models\Header;

class HeaderTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_header_model(): void
    {
        $header = Header::fromArray([
            'description' => 'Example description',
            'style' => 'matrix',
            'required' => true,
            'deprecated' => true,
            'allowEmptyValue' => true,
            'explode' => true,
            'allowReserved' => true,
        ]);

        $this->assertEquals('Example description', $header->getDescription());
        $this->assertEquals('matrix', $header->getStyle());
        $this->assertTrue($header->isRequired());
        $this->assertTrue($header->isDeprecated());
        $this->assertTrue($header->isAllowEmptyValue());
        $this->assertTrue($header->isExplode());
        $this->assertTrue($header->isAllowReserved());
    }

    /**
     * @test
     */
    public function it_should_parse_header_model_without_not_required_data(): void
    {
        $header = Header::fromArray([]);

        $this->assertEquals(null, $header->getDescription());
        $this->assertEquals(null, $header->getStyle());
        $this->assertFalse($header->isRequired());
        $this->assertFalse($header->isDeprecated());
        $this->assertFalse($header->isAllowEmptyValue());
        $this->assertFalse($header->isExplode());
        $this->assertFalse($header->isAllowReserved());
    }
}
