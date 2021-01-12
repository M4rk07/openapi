<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Models\SecurityRequirement;

class SecurityRequirementTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_security_requirement_model(): void
    {
        $security_requirement = SecurityRequirement::fromArray([
            'requirements' => ['Some requirement']
        ]);

        $this->assertCount(1, $security_requirement->getRequirements());
        $this->assertEquals('Some requirement', $security_requirement->getRequirements()[0]);
    }

    /**
     * @test
     */
    public function it_should_parse_security_requirement_model_without_not_required_data(): void
    {
        $security_requirement = SecurityRequirement::fromArray([]);

        $this->assertEmpty($security_requirement->getRequirements());
    }
}
