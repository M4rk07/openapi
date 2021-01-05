<?php

namespace Restz\OpenAPI\Models;

class Reference implements Model
{
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

    public static function fromArray(array $data): Model
    {
        // TODO: Implement fromArray() method.
    }
}
