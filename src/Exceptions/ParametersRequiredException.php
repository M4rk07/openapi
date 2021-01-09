<?php

namespace Restz\OpenAPI\Exceptions;

use Exception;

class ParametersRequiredException extends Exception
{
    public function __construct(array $parameters)
    {
        parent::__construct(sprintf("%s are required", implode(',', $parameters)), 0, null);
    }
}
