<?php

namespace Restz\OpenAPI\Models;

class Operation implements Model
{
    /**
     * A list of tags for API documentation control. Tags can be
     * used for logical grouping of operations by resources or any other qualifier.
     *
     * @var string[]
     */
    protected array $tags;
    /**
     * A short summary of what the operation does.
     */
    protected ?string $summary;
    /**
     * A verbose explanation of the operation behavior.
     * CommonMark syntax MAY be used for rich text representation.
     */
    protected ?string $description;
    /**
     * Unique string used to identify the operation. The id MUST be
     * unique among all operations described in the API. The operationId
     * value is case-sensitive. Tools and libraries MAY use the operationId
     * to uniquely identify an operation, therefore, it is RECOMMENDED to
     * follow common programming naming conventions.
     */
    protected ?string $operation_id;
    /**
     * Declares this operation to be deprecated. Consumers SHOULD
     * refrain from usage of the declared operation. Default value is false.
     */
    protected bool $deprecated;
    /**
     * Additional external documentation for this operation.
     */
    protected ?ExternalDocumentation $external_docs;
    /**
     * A list of parameters that are applicable for this operation.
     * If a parameter is already defined at the Path Item, the new definition
     * will override it but can never remove it. The list MUST NOT include
     * duplicated parameters. A unique parameter is defined by a combination of a name
     * and location. The list can use the Reference Object to link to parameters that
     * are defined at the OpenAPI Object's components/parameters.
     */
    protected array $parameters;
    /**
     * The request body applicable for this operation. The requestBody is only supported
     * in HTTP methods where the HTTP 1.1 specification RFC7231 has explicitly defined
     * semantics for request bodies. In other cases where the HTTP spec is vague,
     * requestBody SHALL be ignored by consumers.
     *
     * @var RequestBody|Reference|null
     */
    protected $request_body;
    /**
     * REQUIRED. The list of possible responses as they are
     * returned from executing this operation.
     *
     * @var Response[]
     */
    protected array $responses;
    /**
     * A map of possible out-of band callbacks related to the parent operation.
     * The key is a unique identifier for the Callback Object. Each value in the map
     * is a Callback Object that describes a request that may be initiated by the
     * API provider and the expected responses.
     */
    protected array $callbacks;
    /**
     * A declaration of which security mechanisms can be used for this operation. The list of
     * values includes alternative security requirement objects that can be used. Only one of
     * the security requirement objects need to be satisfied to authorize a request. To make
     * security optional, an empty security requirement ({}) can be included in the array.
     * This definition overrides any declared top-level security. To remove a top-level
     * security declaration, an empty array can be used.
     */
    protected array $security;
    /**
     * An alternative server array to service this operation. If an alternative
     * server object is specified at the Path Item Object or Root level,
     * it will be overridden by this value.
     */
    protected array $servers;

    /**
     * Operation constructor.
     * @param  string[]  $tags
     * @param  string|null  $summary
     * @param  string|null  $description
     * @param  string|null  $operation_id
     * @param  bool  $deprecated
     * @param  ExternalDocumentation|null  $external_docs
     * @param  array  $parameters
     * @param  Reference|RequestBody|null  $request_body
     * @param  Response[]  $responses
     * @param  array  $callbacks
     * @param  array  $security
     * @param  array  $servers
     */
    public function __construct(
        array $tags,
        ?string $summary,
        ?string $description,
        ?string $operation_id,
        bool $deprecated,
        ?ExternalDocumentation $external_docs,
        array $parameters,
        $request_body,
        array $responses,
        array $callbacks,
        array $security,
        array $servers
    ) {
        $this->tags = $tags;
        $this->summary = $summary;
        $this->description = $description;
        $this->operation_id = $operation_id;
        $this->deprecated = $deprecated;
        $this->external_docs = $external_docs;
        $this->parameters = $parameters;
        $this->request_body = $request_body;
        $this->responses = $responses;
        $this->callbacks = $callbacks;
        $this->security = $security;
        $this->servers = $servers;
    }

    public static function fromArray(array $data): self
    {
        $responses = $data['responses'] ?? [];

        foreach ($responses as &$response) {
            $response = Response::fromArray($response);
        }

        return new self(
            $data['tags'] ?? [],
            $data['summary'] ?? null,
            $data['description'] ?? null,
            $data['operationId'] ?? null,
            $data['deprecated'] ?? false,
            isset($data['externalDocs']) ? ExternalDocumentation::fromArray($data['externalDocs']) : null,
            $data['parameters'] ?? [],
            isset($data['requestBody']) ? RequestBody::fromArray($data['requestBody']) : null,
            $responses,
            $data['callbacks'] ?? [],
            $data['security'] ?? [],
            $data['servers'] ?? [],
        );
    }
}
