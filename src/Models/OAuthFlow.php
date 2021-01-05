<?php

namespace Restz\OpenAPI\Models;

class OAuthFlow implements Model
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

    /**
     * OAuthFlow constructor.
     * @param  string  $authorization_url
     * @param  string  $token_url
     * @param  string  $refresh_url
     * @param  string[]  $scopes
     */
    public function __construct(string $authorization_url, string $token_url, string $refresh_url, array $scopes)
    {
        $this->authorization_url = $authorization_url;
        $this->token_url = $token_url;
        $this->refresh_url = $refresh_url;
        $this->scopes = $scopes;
    }

    public static function fromArray(array $data): Model
    {
        // TODO: Implement fromArray() method.
    }
}
