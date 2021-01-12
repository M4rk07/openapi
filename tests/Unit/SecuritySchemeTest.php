<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\OAuthFlow;
use Restz\OpenAPI\Models\SecurityScheme;

class SecuritySchemeTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_security_requirement_model(): void
    {
        $security_scheme = SecurityScheme::fromArray([
            'type' => 'apiKey',
            'description' => 'Example description',
            'name' => 'X-Bearer-Token',
            'in' => 'header',
            'scheme' => 'Scheme',
            'bearerFormat' => 'base64',
            'flows' => [
                [
                    'authorizationUrl' => 'http://example.com/authorization',
                    'tokenUrl' => 'http://example.com/token'
                ]
            ],
            'openIdConnectUrl' => 'ConnectID'
        ]);

        $this->assertEquals('apiKey', $security_scheme->getType());
        $this->assertEquals('Example description', $security_scheme->getDescription());
        $this->assertEquals('X-Bearer-Token', $security_scheme->getName());
        $this->assertEquals('header', $security_scheme->getIn());
        $this->assertEquals('Scheme', $security_scheme->getScheme());
        $this->assertEquals('base64', $security_scheme->getBearerFormat());
        $this->assertCount(1, $security_scheme->getFlows());
        $this->assertInstanceOf(OAuthFlow::class, $security_scheme->getFlows()[0]);
        $this->assertEquals('ConnectID', $security_scheme->getOpenIdConnectUrl());
    }

    /**
     * @test
     */
    public function it_should_parse_security_requirement_model_without_not_required_data(): void
    {
        $security_scheme = SecurityScheme::fromArray([
            'type' => 'apiKey',
            'name' => 'X-Bearer-Token',
            'in' => 'header',
            'scheme' => 'Scheme',
            'flows' => [
                [
                    'authorizationUrl' => 'http://example.com/authorization',
                    'tokenUrl' => 'http://example.com/token'
                ]
            ],
            'openIdConnectUrl' => 'ConnectID'
        ]);


        $this->assertEquals('apiKey', $security_scheme->getType());
        $this->assertEquals('X-Bearer-Token', $security_scheme->getName());
        $this->assertEquals('header', $security_scheme->getIn());
        $this->assertEquals('Scheme', $security_scheme->getScheme());
        $this->assertCount(1, $security_scheme->getFlows());
        $this->assertInstanceOf(OAuthFlow::class, $security_scheme->getFlows()[0]);
        $this->assertEquals('ConnectID', $security_scheme->getOpenIdConnectUrl());
        $this->assertNull($security_scheme->getDescription());
        $this->assertNull($security_scheme->getBearerFormat());
    }

    /**
     * @test
     */
    public function it_should_not_parse_security_scheme_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        SecurityScheme::fromArray([]);
    }
}
