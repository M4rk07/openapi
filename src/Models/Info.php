<?php

namespace Restz\OpenAPI\Models;

class Info implements Model
{
    /**
     * REQUIRED. The title of the API.
     */
    protected string $title;
    /**
     * REQUIRED. The version of the OpenAPI document
     * (which is distinct from the OpenAPI Specification version or the API implementation version).
     */
    protected string $version;
    /**
     * A short description of the API.
     * CommonMark syntax MAY be used for rich text representation.
     */
    protected ?string $description;
    /**
     * A URL to the Terms of Service for the API.
     * MUST be in the format of a URL.
     */
    protected ?string $terms_of_service;
    /**
     * The contact information for the exposed API.
     */
    protected ?Contact $contact;
    /**
     * The license information for the exposed API.
     */
    protected ?License $license;

    /**
     * Info constructor.
     * @param  string  $title
     * @param  string  $version
     * @param  string|null  $description
     * @param  string|null  $terms_of_service
     * @param  Contact|null  $contact
     * @param  License|null  $license
     */
    public function __construct(
        string $title,
        string $version,
        ?string $description,
        ?string $terms_of_service,
        ?Contact $contact,
        ?License $license
    ) {
        $this->title = $title;
        $this->version = $version;
        $this->description = $description;
        $this->terms_of_service = $terms_of_service;
        $this->contact = $contact;
        $this->license = $license;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['title'],
            $data['version'],
            $data['description'] ?? null,
            $data['termsOfService'] ?? null,
            $data['contact'] ? Contact::fromArray($data['contact']) : null,
            $data['license'] ? License::fromArray($data['license']) : null
        );
    }
}
