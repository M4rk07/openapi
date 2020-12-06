<?php


namespace Restz\OpenAPI\Models;


class SecurityScheme
{
    protected string $type;
    protected string $description;
    protected string $name;
    protected string $in;
    protected string $scheme;
    protected string $open_id_connect_url;
}
