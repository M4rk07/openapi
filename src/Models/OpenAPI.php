<?php

namespace Restz\OpenAPI\Models;

class OpenAPI extends AbstractModel
{
    protected static array $required_parameters = [
        'openapi',
        'info',
        'paths'
    ];

    /**
     * REQUIRED. This string MUST be the semantic version number of the OpenAPI Specification
     * version that the OpenAPI document uses. The openapi field SHOULD be used by
     * tooling specifications and clients to interpret the OpenAPI document.
     * This is not related to the API info.version string.
     */
    protected string $openapi;
    /**
     * REQUIRED. Provides metadata about the API. The metadata MAY be used by tooling as required.
     */
    protected Info $info;
    /**
     * An array of Server Objects, which provide connectivity information to a target server.
     * If the servers property is not provided, or is an empty array, the default value would
     * be a Server Object with a url value of /.
     *
     * @var Server[]
     */
    protected array $servers;
    /**
     * REQUIRED. The available paths and operations for the API.
     *
     * @var PathItem[]
     */
    protected array $paths;
    /**
     * An element to hold various schemas for the specification.
     */
    protected array $components;
    /**
     * A declaration of which security mechanisms can be used across the API.
     * The list of values includes alternative security requirement objects that can be used.
     * Only one of the security requirement objects need to be satisfied to authorize a request.
     * Individual operations can override this definition. To make security optional,
     * an empty security requirement ({}) can be included in the array.
     *
     * @var SecurityRequirement[]
     */
    protected array $security;
    /**
     * A list of tags used by the specification with additional metadata.
     * The order of the tags can be used to reflect on their order by the parsing tools.
     * Not all tags that are used by the Operation Object must be declared.
     * The tags that are not declared MAY be organized randomly or based on the tools' logic.
     * Each tag name in the list MUST be unique.
     *
     * @var Tag[]
     */
    protected array $tags;
    /**
     * Additional external documentation.
     */
    protected ?ExternalDocumentation $external_docs;

    /**
     * OpenAPI constructor.
     * @param  string  $openapi
     * @param  Info  $info
     * @param  Server[]  $servers
     * @param  PathItem[]  $paths
     * @param  array  $components
     * @param  SecurityRequirement[]  $security
     * @param  Tag[]  $tags
     * @param  ExternalDocumentation|null  $external_doc
     */
    public function __construct(
        string $openapi,
        Info $info,
        array $servers,
        array $paths,
        array $components,
        array $security,
        array $tags,
        ?ExternalDocumentation $external_docs
    ) {
        $this->openapi = $openapi;
        $this->info = $info;
        $this->servers = $servers;
        $this->paths = $paths;
        $this->components = $components;
        $this->security = $security;
        $this->tags = $tags;
        $this->external_docs = $external_docs;
    }

    protected static function constructFromArray(array $data): self
    {
        $paths = $data['paths'];
        $servers = $data['servers'] ?? [];
        $security = $data['security'] ?? [];
        $tags = $data['tags'] ?? [];

        foreach ($servers as &$server) {
            $server = Server::fromArray($server);
        }

        foreach ($paths as &$path) {
            $path = PathItem::fromArray($path);
        }

        foreach ($security as &$security_requirement) {
            $security_requirement = SecurityRequirement::fromArray($security_requirement);
        }

        foreach ($tags as &$tag) {
            $tag = Tag::fromArray($tag);
        }

        // TODO: handle components

        return new self(
            $data['openapi'],
            Info::fromArray($data['info']),
            $servers,
            $paths,
            $data['components'] ?? [],
            $security,
            $tags,
            isset($data['externalDocs']) ? ExternalDocumentation::fromArray($data['externalDocs']) : null
        );
    }

    /**
     * @return string
     */
    public function getOpenapi(): string
    {
        return $this->openapi;
    }

    /**
     * @return Info
     */
    public function getInfo(): Info
    {
        return $this->info;
    }

    /**
     * @return Server[]
     */
    public function getServers(): array
    {
        return $this->servers;
    }

    /**
     * @return PathItem[]
     */
    public function getPaths(): array
    {
        return $this->paths;
    }

    /**
     * @return array
     */
    public function getComponents(): array
    {
        return $this->components;
    }

    /**
     * @return SecurityRequirement[]
     */
    public function getSecurity(): array
    {
        return $this->security;
    }

    /**
     * @return Tag[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return ExternalDocumentation|null
     */
    public function getExternalDocs(): ?ExternalDocumentation
    {
        return $this->external_docs;
    }
}
