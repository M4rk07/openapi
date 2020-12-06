<?php


namespace Restz\OpenAPI\Models;


class Encoding
{
    protected string $content_type;
    protected array $headers;
    protected string $style;
    protected bool $explode;
    protected bool $allow_reserved;
}
