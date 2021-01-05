<?php

namespace Restz\OpenAPI\Models;

class MediaType implements Model
{
    /**
     * @var Schema|Reference
     */
    protected $schema;
    /**
     * @var Encoding[]
     */
    protected array $encoding;

    /**
     * MediaType constructor.
     * @param  Reference|Schema  $schema
     * @param  Encoding[]  $encoding
     */
    public function __construct($schema, array $encoding)
    {
        $this->schema = $schema;
        $this->encoding = $encoding;
    }

    public static function fromArray(array $data): Model
    {
        // TODO: Implement fromArray() method.
    }
}
