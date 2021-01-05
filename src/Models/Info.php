<?php

namespace Restz\OpenAPI\Models;

class Info implements Model
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

    /**
     * Info constructor.
     * @param  string  $title
     * @param  string  $description
     * @param  string  $terms_of_service
     * @param  string  $version
     * @param  Contact  $contact
     * @param  License  $license
     */
    public function __construct(
        string $title,
        string $description,
        string $terms_of_service,
        string $version,
        Contact $contact,
        License $license
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->terms_of_service = $terms_of_service;
        $this->version = $version;
        $this->contact = $contact;
        $this->license = $license;
    }

    public static function fromArray(array $data): Model
    {
        // TODO: Implement fromArray() method.
    }
}
