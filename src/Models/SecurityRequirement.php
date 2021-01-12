<?php

namespace Restz\OpenAPI\Models;

class SecurityRequirement extends AbstractModel
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

    protected static function constructFromArray(array $data): self
    {
        return new self(
            $data['requirements'] ?? []
        );
    }

    /**
     * @return string[]
     */
    public function getRequirements(): array
    {
        return $this->requirements;
    }
}
