<?php

namespace Restz\OpenAPI\Models;

class Parameter implements Model
{
    /**
     * REQUIRED. The name of the parameter. Parameter names are case sensitive.
     * - If in is "path", the name field MUST correspond to a template expression occurring
     *   within the path field in the Paths Object. See Path Templating for further information.
     * - If in is "header" and the name field is "Accept", "Content-Type" or
     *   "Authorization", the parameter definition SHALL be ignored.
     * - For all other cases, the name corresponds to the parameter
     *   name used by the in property.
     */
    protected string $name;
    /**
     * REQUIRED. The location of the parameter. Possible values
     * are "query", "header", "path" or "cookie".
     */
    protected string $in;
    /**
     * A brief description of the parameter. This could contain examples
     * of use. CommonMark syntax MAY be used for rich text representation.
     */
    protected string $description;
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
    protected string $style;
    /**
     * When this is true, parameter values of type array or object generate separate parameters
     * for each value of the array or key-value pair of the map. For other types of parameters
     * this property has no effect. When style is form, the default value is true. For all
     * other styles, the default value is false.
     */
    protected string $explode;
    /**
     * Determines whether the parameter value SHOULD allow reserved characters, as
     * defined by RFC3986 :/?#[]@!$&'()*+,;= to be included without percent-encoding.
     * This property only applies to parameters with an in value of query.
     * The default value is false.
     */
    protected bool $allow_reserved;
    /**
     * The schema defining the type used for the parameter.
     *
     * @var Schema|Reference
     */
    protected $schema;
    /**
     * A map containing the representations for the parameter.
     * The key is the media type and the value describes it.
     * The map MUST only contain one entry.
     *
     * @var MediaType[]
     */
    protected array $content;

    /**
     * Parameter constructor.
     * @param  string  $name
     * @param  string  $in
     * @param  string  $description
     * @param  bool  $required
     * @param  bool  $deprecated
     * @param  bool  $allow_empty_value
     * @param  string  $style
     * @param  string  $explode
     * @param  bool  $allow_reserved
     * @param  Reference|Schema  $schema
     * @param  MediaType[]  $content
     */
    public function __construct(
        string $name,
        string $in,
        string $description,
        bool $required,
        bool $deprecated,
        bool $allow_empty_value,
        string $style,
        string $explode,
        bool $allow_reserved,
        $schema,
        array $content
    ) {
        $this->name = $name;
        $this->in = $in;
        $this->description = $description;
        $this->required = $required;
        $this->deprecated = $deprecated;
        $this->allow_empty_value = $allow_empty_value;
        $this->style = $style;
        $this->explode = $explode;
        $this->allow_reserved = $allow_reserved;
        $this->schema = $schema;
        $this->content = $content;
    }

    public static function fromArray(array $data): Model
    {
        // TODO: Implement fromArray() method.
    }
}
