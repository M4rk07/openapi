<?php

namespace Restz\OpenAPI\Models;

class License extends AbstractModel
{
    protected static array $required_parameters = [
        'name'
    ];

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

    protected static function constructFromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['url'] ?? null
        );
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
}
