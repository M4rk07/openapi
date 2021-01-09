<?php

namespace Restz\OpenAPI\Models;

class Header extends AbstractModel
{
    /**
     * A brief description of the parameter. This could contain examples
     * of use. CommonMark syntax MAY be used for rich text representation.
     */
    protected ?string $description;
    /**
     * Determines whether this parameter is mandatory. If the parameter location is "path", this
     * property is REQUIRED and its value MUST be true. Otherwise,
     * the property MAY be included and its default value is false.
     */
    protected bool $required;
    /**
     * Specifies that a parameter is deprecated and SHOULD be
     * transitioned out of usage. Default value is false.
     */
    protected bool $deprecated;
    /**
     * Sets the ability to pass empty-valued parameters. This is valid only for query parameters
     * and allows sending a parameter with an empty value. Default value is false. If style is
     * used, and if behavior is n/a (cannot be serialized), the value of allowEmptyValue SHALL
     * be ignored. Use of this property is NOT RECOMMENDED, as it is likely
     * to be removed in a later revision.
     */
    protected bool $allow_empty_value;
    /**
     * Describes how the parameter value will be serialized depending on the
     * type of the parameter value. Default values (based on value of in): for
     * query - form; for path - simple; for header - simple; for cookie - form.
     *
     * Possible values:
     * matrix, label, form, simple, spaceDelimited, pipeDelimited, deepObject
     */
    protected ?string $style;
    /**
     * When this is true, parameter values of type array or object generate separate parameters
     * for each value of the array or key-value pair of the map. For other types of parameters
     * this property has no effect. When style is form, the default value is true. For all
     * other styles, the default value is false.
     */
    protected bool $explode;
    /**
     * Determines whether the parameter value SHOULD allow reserved characters, as
     * defined by RFC3986 :/?#[]@!$&'()*+,;= to be included without percent-encoding.
     * This property only applies to parameters with an in value of query.
     * The default value is false.
     */
    protected bool $allow_reserved;

    /**
     * Header constructor.
     * @param  string|null  $description
     * @param  bool  $required
     * @param  bool  $deprecated
     * @param  bool  $allow_empty_value
     * @param  string|null  $style
     * @param  bool  $explode
     * @param  bool  $allow_reserved
     */
    public function __construct(
        ?string $description,
        bool $required,
        bool $deprecated,
        bool $allow_empty_value,
        ?string $style,
        bool $explode,
        bool $allow_reserved
    ) {
        $this->description = $description;
        $this->required = $required;
        $this->deprecated = $deprecated;
        $this->allow_empty_value = $allow_empty_value;
        $this->style = $style;
        $this->explode = $explode;
        $this->allow_reserved = $allow_reserved;
    }

    protected static function constructFromArray(array $data): self
    {
        return new self(
            $data['description'] ?? null,
            $data['required'] ?? false,
            $data['deprecated'] ?? false,
            $data['allowEmptyValue'] ?? false,
            $data['style'] ?? null,
            $data['explode'] ?? false,
            $data['allowReserved'] ?? false
        );
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @return bool
     */
    public function isDeprecated(): bool
    {
        return $this->deprecated;
    }

    /**
     * @return bool
     */
    public function isAllowEmptyValue(): bool
    {
        return $this->allow_empty_value;
    }

    /**
     * @return string|null
     */
    public function getStyle(): ?string
    {
        return $this->style;
    }

    /**
     * @return bool
     */
    public function isExplode(): bool
    {
        return $this->explode;
    }

    /**
     * @return bool
     */
    public function isAllowReserved(): bool
    {
        return $this->allow_reserved;
    }
}
