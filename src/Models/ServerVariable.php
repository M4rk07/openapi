<?php

namespace Restz\OpenAPI\Models;

class ServerVariable extends AbstractModel
{
    protected static array $required_parameters = [
        'default'
    ];

    /**
     * An enumeration of string values to be used if the substitution
     * options are from a limited set. The array SHOULD NOT be empty.
     *
     * @var string[]
     */
    protected array $enum;
    /**
     * REQUIRED. The default value to use for substitution, which SHALL
     * be sent if an alternate value is not supplied. Note this behavior is
     * different than the Schema Object's treatment of default values, because
     * in those cases parameter values are optional. If the enum is defined,
     * the value SHOULD exist in the enum's values.
     */
    protected string $default;
    /**
     * An optional description for the server variable.
     * CommonMark syntax MAY be used for rich text representation.
     */
    protected ?string $description;

    /**
     * ServerVariable constructor.
     * @param  string[]  $enum
     * @param  string  $default
     * @param  string|null  $description
     */
    public function __construct(array $enum, string $default, ?string $description)
    {
        $this->enum = $enum;
        $this->default = $default;
        $this->description = $description;
    }

    protected static function constructFromArray(array $data): self
    {
        return new self(
            $data['enum'] ?? [],
            $data['default'],
            $data['description'] ?? null
        );
    }

    /**
     * @return string[]
     */
    public function getEnum(): array
    {
        return $this->enum;
    }

    /**
     * @return string
     */
    public function getDefault(): string
    {
        return $this->default;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}
