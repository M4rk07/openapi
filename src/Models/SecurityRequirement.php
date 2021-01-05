<?php

namespace Restz\OpenAPI\Models;

class SecurityRequirement implements Model
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

    /**
     * SecurityRequirement constructor.
     * @param  string[]  $requirements
     */
    public function __construct(array $requirements)
    {
        $this->requirements = $requirements;
    }

    public static function fromArray(array $data): Model
    {
        // TODO: Implement fromArray() method.
    }
}
