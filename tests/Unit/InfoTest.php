<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\Contact;
use Restz\OpenAPI\Models\info;
use Restz\OpenAPI\Models\License;

class InfoTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_info_model(): void
    {
        $info = Info::fromArray([
            'title' => 'Great API',
            'version' => '3.0',
            'description' => 'Example description',
            'termsOfService' => 'Example terms of service',
            'contact' => [
                'name' => 'John Doe'
            ],
            'license' => [
                'name' => 'MIT'
            ],
        ]);

        $this->assertEquals('Great API', $info->getTitle());
        $this->assertEquals('3.0', $info->getVersion());
        $this->assertEquals('Example description', $info->getDescription());
        $this->assertEquals('Example terms of service', $info->getTermsOfService());
        $this->assertInstanceOf(Contact::class, $info->getContact());
        $this->assertInstanceOf(License::class, $info->getLicense());
    }

    /**
     * @test
     */
    public function it_should_parse_info_model_without_not_required_data(): void
    {
        $info = Info::fromArray([
            'title' => 'Great API',
            'version' => '3.0',
        ]);

        $this->assertEquals('Great API', $info->getTitle());
        $this->assertEquals('3.0', $info->getVersion());
        $this->assertNull($info->getDescription());
        $this->assertNull($info->getTermsOfService());
        $this->assertNull($info->getContact());
        $this->assertNull($info->getLicense());
    }

    /**
     * @test
     */
    public function it_should_not_parse_info_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        Info::fromArray([]);
    }
}
