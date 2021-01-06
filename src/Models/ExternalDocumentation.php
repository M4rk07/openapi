<?php

namespace Restz\OpenAPI\Models;

class ExternalDocumentation implements Model
{
    /**
     * REQUIRED. The URL for the target documentation.
     * Value MUST be in the format of a URL.
     */
    protected string $url;
    /**
     * A short description of the target documentation.
     * CommonMark syntax MAY be used for rich text representation
     */
    protected ?string $description;

    /**
     * ExternalDocumentation constructor.
     * @param  string  $url
     * @param  string|null  $description
     */
    public function __construct(string $url, ?string $description)
    {
        $this->description = $description;
        $this->url = $url;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['url'],
            $data['description'] ?? null
        );
    }
}
