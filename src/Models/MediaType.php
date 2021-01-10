<?php

namespace Restz\OpenAPI\Models;

class MediaType extends AbstractModel
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

    protected static function constructFromArray(array $data): self
    {
        $encoding = $data['encoding'] ?? [];

        foreach ($encoding as &$e) {
            $e = Encoding::fromArray($e);
        }

        return new self(
            isset($data['schema']) ? Schema::fromArray($data['schema']) : null,
            $encoding
        );
    }

    /**
     * @return Reference|Schema|null
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @return Encoding[]
     */
    public function getEncoding(): array
    {
        return $this->encoding;
    }
}
