<?php


namespace Restz\OpenAPI\Models;


class Link
{
    protected string $operation_ref;
    protected string $operation_id;
    protected array $parameters;
    protected string $description;
}
