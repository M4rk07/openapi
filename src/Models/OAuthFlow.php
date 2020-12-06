<?php


namespace Restz\OpenAPI\Models;


class OAuthFlow
{
    protected string $authorization_url;
    protected string $token_url;
    protected string $refresh_url;
    protected array $scopes;
}
