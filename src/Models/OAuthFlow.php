<?php

namespace Restz\OpenAPI\Models;

class OAuthFlow extends AbstractModel
{
    protected static array $required_parameters = [
        'authorizationUrl',
        'tokenUrl'
    ];

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
    protected ?string $refresh_url;
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
     * @param  string|null  $refresh_url
     * @param  string[]  $scopes
     */
    public function __construct(string $authorization_url, string $token_url, ?string $refresh_url, array $scopes)
    {
        $this->authorization_url = $authorization_url;
        $this->token_url = $token_url;
        $this->refresh_url = $refresh_url;
        $this->scopes = $scopes;
    }

    protected static function constructFromArray(array $data): self
    {
        return new self(
            $data['authorizationUrl'],
            $data['tokenUrl'],
            $data['refreshUrl'] ?? null,
            $data['scopes'] ?? []
        );
    }

    /**
     * @return string
     */
    public function getAuthorizationUrl(): string
    {
        return $this->authorization_url;
    }

    /**
     * @return string
     */
    public function getTokenUrl(): string
    {
        return $this->token_url;
    }

    /**
     * @return string|null
     */
    public function getRefreshUrl(): ?string
    {
        return $this->refresh_url;
    }

    /**
     * @return string[]
     */
    public function getScopes(): array
    {
        return $this->scopes;
    }
}
