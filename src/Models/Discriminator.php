<?php

namespace Restz\OpenAPI\Models;

class Discriminator implements Model
{
    /**
     * REQUIRED. The name of the property in the payload
     * that will hold the discriminator value.
     */
    protected string $property_name;
    /**
     * An object to hold mappings between payload
     * values and schema names or references.
     *
     * @var string[]
     */
    protected array $mapping;

    /**
     * Discriminator constructor.
     * @param  string  $property_name
     * @param  string[]  $mapping
     */
    private function __construct(string $property_name, array $mapping)
    {
        $this->property_name = $property_name;
        $this->mapping = $mapping;
    }

    public static function fromArray(array $data): Model
    {
        return new self(
            $data['propertyName'],
            $data['mapping'] ?? []
        );
    }
}
