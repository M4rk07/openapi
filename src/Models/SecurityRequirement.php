<?php


namespace Restz\OpenAPI\Models;


class SecurityRequirement
{
    /**
     * Each name MUST correspond to a security scheme which is declared in the
     * Security Schemes under the Components Object. If the security scheme is
     * of type "oauth2" or "openIdConnect", then the value is a list of scope names
     * required for the execution, and the list MAY be empty if authorization does not
     * require a specified scope. For other security scheme types, the array MUST be empty.
     *
     * @var string[]
     */
    protected array $requirements;
}
