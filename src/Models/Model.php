<?php

namespace Restz\OpenAPI\Models;

interface Model
{
    public static function fromArray(array $data): self;
}
