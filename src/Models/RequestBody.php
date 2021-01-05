<?php

namespace Restz\OpenAPI\Models;

class RequestBody implements Model
{
    /**
     * A brief description of the request body. This could contain
     * examples of use. CommonMark syntax MAY be used for rich text representation.
     */
    protected string $description;
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
     * RequestBody constructor.
     * @param  string  $description
     * @param  bool  $required
     * @param  MediaType[]  $content
     */
    public function __construct(string $description, bool $required, array $content)
    {
        $this->description = $description;
        $this->required = $required;
        $this->content = $content;
    }

    public static function fromArray(array $data): Model
    {
        // TODO: Implement fromArray() method.
    }
}
