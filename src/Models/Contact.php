<?php

namespace Restz\OpenAPI\Models;

use Restz\OpenAPI\Exceptions\ParametersRequiredException;

class Contact extends AbstractModel
{
    /**
     * The identifying name of the contact person/organization.
     */
    protected ?string $name;
    /**
     * The URL pointing to the contact information.
     * MUST be in the format of a URL.
     */
    protected ?string $url;
    /**
     * The email address of the contact person/organization.
     * MUST be in the format of an email address.
     */
    protected ?string $email;

    /**
     * Contact constructor.
     * @param  string|null  $name
     * @param  string|null  $url
     * @param  string|null  $email
     */
    private function __construct(?string $name, ?string $url, ?string $email)
    {
        $this->name = $name;
        $this->url = $url;
        $this->email = $email;
    }

    /**
     * @param  array  $data
     * @return static
     * @throws ParametersRequiredException
     */
    protected static function constructFromArray(array $data): self
    {
        return new self(
            $data['name'] ?? null,
            $data['url'] ?? null,
            $data['email'] ?? null
        );
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
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

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
}
