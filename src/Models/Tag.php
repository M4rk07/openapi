<?php

namespace Restz\OpenAPI\Models;

class Tag implements Model
{
    /**
     * REQUIRED. The name of the tag.
     */
    protected string $name;
    /**
     * A short description for the tag.
     * CommonMark syntax MAY be used for rich text representation.
     */
    protected ?string $description;
    /**
     * Additional external documentation for this tag.
     */
    protected ?ExternalDocumentation $external_docs;

    /**
     * Tag constructor.
     * @param  string  $name
     * @param  string|null  $description
     * @param  ExternalDocumentation|null  $external_docs
     */
    public function __construct(string $name, ?string $description, ?ExternalDocumentation $external_docs)
    {
        $this->name = $name;
        $this->description = $description;
        $this->external_docs = $external_docs;
    }

    public static function fromArray(array $data): self
    {
        $external_docs = $data['externalDocs'] ?? [];

        foreach ($external_docs as &$external_doc) {
            $external_doc = ExternalDocumentation::fromArray($data['externalDocs']);
        }

        return new self(
            $data['name'],
            $data['description'] ?? null,
            $external_docs
        );
    }
}
