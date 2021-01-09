<?php

namespace Restz\OpenAPI\Models;

use Restz\OpenAPI\Exceptions\ParametersRequiredException;

abstract class AbstractModel implements Model
{
    protected static array $required_parameters = [];

    /**
     * @param  array  $data
     * @throws ParametersRequiredException
     */
    protected static function assertRequired(array $data): void
    {
        if ($parameters = array_diff_key(array_flip(static::$required_parameters), $data)) {
            throw new ParametersRequiredException($parameters);
        }
    }

    /**
     * @param  array  $data
     * @return Model
     * @throws ParametersRequiredException
     */
    public static function fromArray(array $data): Model
    {
        self::assertRequired($data);

        return static::constructFromArray($data);
    }

    /**
     * @param  array  $data
     * @return Model
     */
    abstract protected static function constructFromArray(array $data): Model;
}
