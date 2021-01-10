<?php

namespace Restz\OpenAPI\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Restz\OpenAPI\Exceptions\ParametersRequiredException;
use Restz\OpenAPI\Models\OAuthFlow;

class OAuthFlowTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_oauth_flow_model(): void
    {
        $oauth_flow = OAuthFlow::fromArray([
            'authorizationUrl' => 'http://example.com/authorization',
            'tokenUrl' => 'http://example.com/token',
            'refreshUrl' => 'http://example.com/refresh',
            'scopes' => ['pictures']
        ]);

        $this->assertEquals('http://example.com/authorization', $oauth_flow->getAuthorizationUrl());
        $this->assertEquals('http://example.com/token', $oauth_flow->getTokenUrl());
        $this->assertEquals('http://example.com/refresh', $oauth_flow->getRefreshUrl());
        $this->assertCount(1, $oauth_flow->getScopes());
        $this->assertEquals('pictures', $oauth_flow->getScopes()[0]);
    }

    /**
     * @test
     */
    public function it_should_parse_oauth_flow_model_without_not_required_data(): void
    {
        $oauth_flow = OAuthFlow::fromArray([
            'authorizationUrl' => 'http://example.com/authorization',
            'tokenUrl' => 'http://example.com/token',
        ]);

        $this->assertEquals('http://example.com/authorization', $oauth_flow->getAuthorizationUrl());
        $this->assertEquals('http://example.com/token', $oauth_flow->getTokenUrl());
        $this->assertNull($oauth_flow->getRefreshUrl());
        $this->assertEmpty($oauth_flow->getScopes());
    }

    /**
     * @test
     */
    public function it_should_not_parse_oauth_flow_model_without_required_data(): void
    {
        $this->expectException(ParametersRequiredException::class);

        OAuthFlow::fromArray([]);
    }
}
