<?php

namespace Restz\OpenAPI\Models;

class Contact implements Model
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

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? null,
            $data['url'] ?? null,
            $data['email'] ?? null
        );
    }
}
