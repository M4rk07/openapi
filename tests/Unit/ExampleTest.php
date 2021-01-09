<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Models\Example;

class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_example_model(): void
    {
        $example = Example::fromArray([
            'summary' => 'Example summary',
            'description' => 'Example description',
            'externalValue' => 'External value',
            'value' => 'Value',
        ]);

        $this->assertEquals('Example summary', $example->getSummary());
        $this->assertEquals('Example description', $example->getDescription());
        $this->assertEquals('External value', $example->getExternalValue());
        $this->assertEquals('Value', $example->getValue());
    }

    /**
     * @test
     */
    public function it_should_parse_example_model_without_not_required_data(): void
    {
        $example = Example::fromArray([]);

        $this->assertNull($example->getSummary());
        $this->assertNull($example->getDescription());
        $this->assertNull($example->getExternalValue());
        $this->assertNull($example->getValue());
    }
}
