<?php

namespace Restz\OpenAPI\Models;

class Encoding extends AbstractModel
{
    /**
     * The Content-Type for encoding a specific property. Default value depends
     * on the property type: for string with format being binary – application/octet-stream;
     * for other primitive types – text/plain; for object - application/json;
     * for array – the default is defined based on the inner type.
     * The value can be a specific media type (e.g. application/json),
     * a wildcard media type (e.g. image/*), or a comma-separated list of the two types.
     */
    protected ?string $content_type;
    /**
     * A map allowing additional information to be provided as headers,
     * for example Content-Disposition. Content-Type is described separately
     * and SHALL be ignored in this section. This property SHALL be ignored if
     * the request body media type is not a multipart.
     *
     * @var Header[]|Reference[]
     */
    protected array $headers;
    /**
     * Describes how a specific property value will be serialized depending on
     * its type. See Parameter Object for details on the style property.
     * The behavior follows the same values as query parameters, including default values.
     * This property SHALL be ignored if the request body media type
     * is not application/x-www-form-urlencoded.
     */
    protected ?string $style;
    /**
     * When this is true, property values of type array or object generate
     * separate parameters for each value of the array, or key-value-pair of the map.
     * For other types of properties this property has no effect. When style is form,
     * the default value is true. For all other styles, the default value is false.
     * This property SHALL be ignored if the request body media type is not
     * application/x-www-form-urlencoded.
     */
    protected bool $explode;
    /**
     * Determines whether the parameter value SHOULD allow reserved characters,
     * as defined by RFC3986 :/?#[]@!$&'()*+,;= to be included without percent-encoding.
     * The default value is false. This property SHALL be ignored if the request
     * body media type is not application/x-www-form-urlencoded.
     */
    protected bool $allow_reserved;

    /**
     * Encoding constructor.
     * @param  string|null  $content_type
     * @param  Header[]|Reference[]  $headers
     * @param  string|null  $style
     * @param  bool  $explode
     * @param  bool  $allow_reserved
     */
    public function __construct(
        ?string $content_type,
        array $headers,
        ?string $style,
        bool $explode,
        bool $allow_reserved
    ) {
        $this->content_type = $content_type;
        $this->headers = $headers;
        $this->style = $style;
        $this->explode = $explode;
        $this->allow_reserved = $allow_reserved;
    }

    protected static function constructFromArray(array $data): self
    {
        $headers = $data['headers'] ?? [];

        foreach ($headers as &$header) {
            $header = Header::fromArray($header);
        }

        return new self(
            $data['contentType'] ?? null,
            $headers,
            $data['style'] ?? null,
            $data['explode'] ?? false,
            $data['allowReserved'] ?? false
        );
    }

    /**
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->content_type;
    }

    /**
     * @return Header[]|Reference[]
     */
    public function getHeaders()
    {
        return $this->headers;
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
