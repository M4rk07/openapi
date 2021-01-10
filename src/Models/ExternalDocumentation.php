<?php

namespace Restz\OpenAPI\Models;

class ExternalDocumentation extends AbstractModel
{
    protected static array $required_parameters = [
        'url'
    ];

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
        $this->url = $url;
        $this->description = $description;
    }

    protected static function constructFromArray(array $data): self
    {
        return new self(
            $data['url'],
            $data['description'] ?? null
        );
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}
