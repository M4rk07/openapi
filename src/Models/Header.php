<?php


namespace Restz\OpenAPI\Models;


class Header
{
    protected string $name;
    protected string $in;
    protected string $description;
    protected bool $required;
    protected bool $deprecated;
    protected bool $allow_empty_value;
}
