<?php

namespace Restz\OpenAPI\Models;

class Schema implements Model
{
    /**
     * A true value adds "null" to the allowed type specified by the type keyword,
     * only if type is explicitly defined within the same Schema Object.
     * Other Schema Object constraints retain their defined behavior, and
     * therefore may disallow the use of null as a value. A false value leaves
     * the specified or default type unmodified. The default value is false.
     */
    protected bool $nullable;
    /**
     * Relevant only for Schema "properties" definitions. Declares the property as "read only".
     * This means that it MAY be sent as part of a response but SHOULD NOT be sent as part
     * of the request. If the property is marked as readOnly being true and is in the
     * required list, the required will take effect on the response only. A property MUST NOT
     * be marked as both readOnly and writeOnly being true. Default value is false.
     */
    protected bool $read_only;
    /**
     * Relevant only for Schema "properties" definitions. Declares the property as "write only".
     * Therefore, it MAY be sent as part of a request but SHOULD NOT be sent as part of the response.
     * If the property is marked as writeOnly being true and is in the required list, the required
     * will take effect on the request only. A property MUST NOT be marked as both readOnly
     * and writeOnly being true. Default value is false.
     */
    protected bool $write_only;
    /**
     * Specifies that a schema is deprecated and SHOULD be transitioned out of usage.
     * Default value is false.
     */
    protected bool $deprecated;
    /**
     * Adds support for polymorphism. The discriminator is an object name that is
     * used to differentiate between other schemas which may satisfy the payload
     * description. See Composition and Inheritance for more details.
     */
    protected Discriminator $discriminator;
    /**
     * Additional external documentation for this schema.
     */
    protected ExternalDocumentation $external_docs;
    /**
     * A free-form property to include an example of an instance for this schema.
     * To represent examples that cannot be naturally represented in JSON or YAML,
     * a string value can be used to contain the example with escaping where necessary.
     */
    protected array $example;

    /**
     * Schema constructor.
     * @param  bool  $nullable
     * @param  bool  $read_only
     * @param  bool  $write_only
     * @param  bool  $deprecated
     * @param  Discriminator  $discriminator
     * @param  ExternalDocumentation  $external_docs
     * @param  array  $example
     */
    public function __construct(
        bool $nullable,
        bool $read_only,
        bool $write_only,
        bool $deprecated,
        Discriminator $discriminator,
        ExternalDocumentation $external_docs,
        array $example
    ) {
        $this->nullable = $nullable;
        $this->read_only = $read_only;
        $this->write_only = $write_only;
        $this->deprecated = $deprecated;
        $this->discriminator = $discriminator;
        $this->external_docs = $external_docs;
        $this->example = $example;
    }

    public static function fromArray(array $data): Model
    {
        // TODO: Implement fromArray() method.
    }
}
