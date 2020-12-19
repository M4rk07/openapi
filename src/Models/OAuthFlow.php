<?php


namespace Restz\OpenAPI\Models;


class OAuthFlow
{
    /**
     * REQUIRED. The authorization URL to be used for this flow.
     * This MUST be in the form of a URL.
     */
    protected string $authorization_url;
    /**
     * REQUIRED. The token URL to be used for this flow.
     * This MUST be in the form of a URL.
     */
    protected string $token_url;
    /**
     * The URL to be used for obtaining refresh tokens.
     * This MUST be in the form of a URL.
     */
    protected string $refresh_url;
    /**
     * REQUIRED. The available scopes for the OAuth2 security scheme.
     * A map between the scope name and a short description for it. The map MAY be empty.
     *
     * @var string[]
     */
    protected array $scopes;
}
