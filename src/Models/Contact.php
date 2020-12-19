<?php


namespace Restz\OpenAPI\Models;


class Contact
{
    /**
     * The identifying name of the contact person/organization.
     */
    protected string $name;
    /**
     * The URL pointing to the contact information.
     * MUST be in the format of a URL.
     */
    protected string $url;
    /**
     * The email address of the contact person/organization.
     * MUST be in the format of an email address.
     */
    protected string $email;
}
