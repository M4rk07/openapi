<?php

namespace Restz\OpenAPI\Models;

class Link extends AbstractModel
{
    /**
     * A relative or absolute URI reference to an OAS operation.
     * This field is mutually exclusive of the operationId field,
     * and MUST point to an Operation Object. Relative operationRef
     * values MAY be used to locate an existing Operation Object in
     * the OpenAPI definition.
     */
    protected ?string $operation_ref;
    /**
     * The name of an existing, resolvable OAS operation,
     * as defined with a unique operationId. This field is mutually
     * exclusive of the operationRef field.
     */
    protected ?string $operation_id;
    /**
     * A map representing parameters to pass to an operation as specified with
     * operationId or identified via operationRef. The key is the parameter
     * name to be used, whereas the value can be a constant or an expression
     * to be evaluated and passed to the linked operation. The parameter name
     * can be qualified using the parameter location [{in}.]{name} for operations
     * that use the same parameter name in different locations (e.g. path.id).
     */
    protected array $parameters;
    /**
     * A description of the link.
     * CommonMark syntax MAY be used for rich text representation.
     */
    protected ?string $description;
    /**
     * A literal value or {expression} to use as a
     * request body when calling the target operation.
     */
    protected ?string $request_body;
    /**
     * A server object to be used by the target operation.
     */
    protected ?Server $server;

    /**
     * Link constructor.
     * @param  string|null  $operation_ref
     * @param  string|null  $operation_id
     * @param  array  $parameters
     * @param  string|null  $description
     * @param  string|null  $request_body
     * @param  Server|null  $server
     */
    public function __construct(
        ?string $operation_ref,
        ?string $operation_id,
        array $parameters,
        ?string $description,
        ?string $request_body,
        ?Server $server
    ) {
        $this->operation_ref = $operation_ref;
        $this->operation_id = $operation_id;
        $this->parameters = $parameters;
        $this->description = $description;
        $this->request_body = $request_body;
        $this->server = $server;
    }

    protected static function constructFromArray(array $data): self
    {
        return new self(
            $data['operationRef'] ?? null,
            $data['operationId'] ?? null,
            $data['parameters'] ?? [],
            $data['description'] ?? null,
            $data['requestBody'] ?? null,
            isset($data['server']) ? Server::fromArray($data['server']) : null
        );
    }

    /**
     * @return string|null
     */
    public function getOperationRef(): ?string
    {
        return $this->operation_ref;
    }

    /**
     * @return string|null
     */
    public function getOperationId(): ?string
    {
        return $this->operation_id;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string|null
     */
    public function getRequestBody(): ?string
    {
        return $this->request_body;
    }

    /**
     * @return Server|null
     */
    public function getServer(): ?Server
    {
        return $this->server;
    }
}
