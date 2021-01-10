<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\License;

class LicenseTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_license_model(): void
    {
        $license = License::fromArray([
            'name' => 'MIT',
            'url' => 'http://example.com',
        ]);

        $this->assertEquals('MIT', $license->getName());
        $this->assertEquals('http://example.com', $license->getUrl());
    }

    /**
     * @test
     */
    public function it_should_parse_license_model_without_not_required_data(): void
    {
        $license = License::fromArray([
            'name' => 'MIT',
        ]);

        $this->assertEquals('MIT', $license->getName());
        $this->assertNull($license->getUrl());
    }

    /**
     * @test
     */
    public function it_should_not_parse_license_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        License::fromArray([]);
    }
}
