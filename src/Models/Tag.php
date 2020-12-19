<?php


namespace Restz\OpenAPI\Models;


class Tag
{
    /**
     * REQUIRED. The name of the tag.
     */
    protected string $name;
    /**
     * A short description for the tag.
     * CommonMark syntax MAY be used for rich text representation.
     */
    protected string $description;
    /**
     * Additional external documentation for this tag.
     */
    protected ExternalDocumentation $external_docs;
}
