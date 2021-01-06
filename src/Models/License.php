<?php

namespace Restz\OpenAPI\Models;

class License implements Model
{
    /**
     * REQUIRED. The license name used for the API.
     */
    protected string $name;
    /**
     * A URL to the license used for the API.
     * MUST be in the format of a URL.
     */
    protected ?string $url;

    /**
     * License constructor.
     * @param  string  $name
     * @param  ?string  $url
     */
    public function __construct(string $name, ?string $url)
    {
        $this->name = $name;
        $this->url = $url;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['url'] ?? null
        );
    }
}
