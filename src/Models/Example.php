<?php

namespace Restz\OpenAPI\Models;

class Example implements Model
{
    /**
     * Short description for the example.
     */
    protected ?string $summary;
    /**
     * Long description for the example.
     * CommonMark syntax MAY be used for rich text representation.
     */
    protected ?string $description;
    /**
     * A URL that points to the literal example. This provides the capability to
     * reference examples that cannot easily be included in JSON or YAML documents.
     * The value field and externalValue field are mutually exclusive.
     */
    protected ?string $external_value;
    /**
     * Embedded literal example. The value field and externalValue
     * field are mutually exclusive. To represent examples of
     * media types that cannot naturally represented in JSON or YAML,
     * use a string value to contain the example, escaping where necessary.
     */
    protected array $value;

    /**
     * Example constructor.
     * @param  string|null  $summary
     * @param  string|null  $description
     * @param  string|null  $external_value
     * @param  array  $value
     */
    public function __construct(?string $summary, ?string $description, ?string $external_value, array $value)
    {
        $this->summary = $summary;
        $this->description = $description;
        $this->external_value = $external_value;
        $this->value = $value;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['summary'] ?? null,
            $data['description'] ?? null,
            $data['externalValue'] ?? null,
            $data['value'] ?? []
        );
    }
}
