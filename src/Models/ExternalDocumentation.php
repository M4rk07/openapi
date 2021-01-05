<?php

namespace Restz\OpenAPI\Models;

class ExternalDocumentation implements Model
{
    /**
     * A short description of the target documentation.
     * CommonMark syntax MAY be used for rich text representation
     */
    protected string $description;
    /**
     * REQUIRED. The URL for the target documentation.
     * Value MUST be in the format of a URL.
     */
    protected string $url;

    /**
     * ExternalDocumentation constructor.
     * @param  string  $description
     * @param  string  $url
     */
    public function __construct(string $description, string $url)
    {
        $this->description = $description;
        $this->url = $url;
    }

    public static function fromArray(array $data): Model
    {
        // TODO: Implement fromArray() method.
    }
}
