<?php

namespace Restz\OpenAPI\Models;

class RequestBody implements Model
{
    /**
     * Determines if the request body is required in the request. Defaults to false.
     */
    protected bool $required;
    /**
     * REQUIRED. The content of the request body. The key is a media type or
     * media type range and the value describes it. For requests that match multiple
     * keys, only the most specific key is applicable. e.g. text/plain overrides text/*
     *
     * @var MediaType[]
     */
    protected array $content;
    /**
     * A brief description of the request body. This could contain
     * examples of use. CommonMark syntax MAY be used for rich text representation.
     */
    protected ?string $description;

    /**
     * RequestBody constructor.
     * @param  bool  $required
     * @param  MediaType[]  $content
     * @param  string|null  $description
     */
    public function __construct(bool $required, array $content, ?string $description)
    {
        $this->required = $required;
        $this->content = $content;
        $this->description = $description;
    }

    public static function fromArray(array $data): self
    {
        $content = $data['content'];

        foreach ($content as &$media_type) {
            $media_type = MediaType::fromArray($media_type);
        }

        return new self(
            $data['required'] ?? false,
            $content,
            $data['description'] ?? null,
        );
    }
}
