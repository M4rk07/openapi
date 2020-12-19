<?php


namespace Restz\OpenAPI\Models;


class MediaType
{
    /**
     * @var Schema|Reference
     */
    protected $schema;
    /**
     * @var Encoding[]
     */
    protected array $encoding;
}
