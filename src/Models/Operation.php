<?php


namespace Restz\OpenAPI\Models;


class Operation
{
    protected array $tags;
    protected string $summary;
    protected string $description;
    protected string $operation_id;
    protected string $deprecated;
}
