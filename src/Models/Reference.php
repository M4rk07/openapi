<?php

namespace Restz\OpenAPI\Models;

class Reference extends AbstractModel
{
    protected static array $required_parameters = [
        'ref'
    ];

    /**
     * REQUIRED. The reference string.
     */
    protected string $ref;

    /**
     * Reference constructor.
     * @param  string  $ref
     */
    public function __construct(string $ref)
    {
        $this->ref = $ref;
    }

    protected static function constructFromArray(array $data): self
    {
        // TODO: Implement constructFromArray() method.
    }

    /**
     * @return string
     */
    public function getRef(): string
    {
        return $this->ref;
    }
}
