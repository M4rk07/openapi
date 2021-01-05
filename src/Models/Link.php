<?php

namespace Restz\OpenAPI\Models;

class Link implements Model
{
    /**
     * A relative or absolute URI reference to an OAS operation.
     * This field is mutually exclusive of the operationId field,
     * and MUST point to an Operation Object. Relative operationRef
     * values MAY be used to locate an existing Operation Object in
     * the OpenAPI definition.
     */
    protected string $operation_ref;
    /**
     * The name of an existing, resolvable OAS operation,
     * as defined with a unique operationId. This field is mutually
     * exclusive of the operationRef field.
     */
    protected string $operation_id;
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
    protected string $description;
    /**
     * A literal value or {expression} to use as a
     * request body when calling the target operation.
     */
    protected array $request_body;
    /**
     * A server object to be used by the target operation.
     */
    protected Server $server;

    /**
     * Link constructor.
     * @param  string  $operation_ref
     * @param  string  $operation_id
     * @param  array  $parameters
     * @param  string  $description
     * @param  array  $request_body
     * @param  Server  $server
     */
    public function __construct(
        string $operation_ref,
        string $operation_id,
        array $parameters,
        string $description,
        array $request_body,
        Server $server
    ) {
        $this->operation_ref = $operation_ref;
        $this->operation_id = $operation_id;
        $this->parameters = $parameters;
        $this->description = $description;
        $this->request_body = $request_body;
        $this->server = $server;
    }

    public static function fromArray(array $data): Model
    {
        // TODO: Implement fromArray() method.
    }
}
