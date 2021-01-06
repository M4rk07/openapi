<?php

namespace Restz\OpenAPI\Models;

class MediaType implements Model
{
    /**
     * @var Schema|Reference|null
     */
    protected $schema;
    /**
     * @var Encoding[]
     */
    protected array $encoding;

    /**
     * MediaType constructor.
     * @param  Reference|Schema|null  $schema
     * @param  Encoding[]  $encoding
     */
    public function __construct($schema, array $encoding)
    {
        $this->schema = $schema;
        $this->encoding = $encoding;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['schema'] ? Schema::fromArray($data['schema']) : null,
            $data['encoding'] ?? []
        );
    }
}
