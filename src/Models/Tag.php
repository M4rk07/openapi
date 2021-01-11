<?php

namespace Restz\OpenAPI\Models;

class Tag extends AbstractModel
{
    protected static array $required_parameters = [
        'name'
    ];

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

    protected static function constructFromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['description'] ?? null,
            isset($data['externalDocs']) ? ExternalDocumentation::fromArray($data['externalDocs']) : null
        );
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return ExternalDocumentation|null
     */
    public function getExternalDocs(): ?ExternalDocumentation
    {
        return $this->external_docs;
    }
}
