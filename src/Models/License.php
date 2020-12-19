<?php


namespace Restz\OpenAPI\Models;


class License
{
    /**
     * REQUIRED. The license name used for the API.
     */
    protected string $name;
    /**
     * A URL to the license used for the API.
     * MUST be in the format of a URL.
     */
    protected string $url;
}
