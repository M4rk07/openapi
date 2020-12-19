<?php


namespace Restz\OpenAPI\Models;


class ExternalDocumentation
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
}
