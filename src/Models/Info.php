<?php


namespace Restz\OpenAPI\Models;


class Info
{
    /**
     * REQUIRED. The title of the API.
     */
    protected string $title;
    /**
     * A short description of the API.
     * CommonMark syntax MAY be used for rich text representation.
     */
    protected string $description;
    /**
     * A URL to the Terms of Service for the API.
     * MUST be in the format of a URL.
     */
    protected string $terms_of_service;
    /**
     * REQUIRED. The version of the OpenAPI document
     * (which is distinct from the OpenAPI Specification version or the API implementation version).
     */
    protected string $version;
    /**
     * The contact information for the exposed API.
     */
    protected Contact $contact;
    /**
     * The license information for the exposed API.
     */
    protected License $license;
}
