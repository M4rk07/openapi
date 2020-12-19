<?php


namespace Restz\OpenAPI\Models;


class Discriminator
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
}
