<?php

namespace Restz\OpenAPI\Models;

class PathItem implements Model
{
    /**
     * Allows for an external definition of this path item.
     * The referenced structure MUST be in the format of a Path Item Object.
     * In case a Path Item Object field appears both in the defined object and
     * the referenced object, the behavior is undefined.
     */
    protected ?string $ref;
    /**
     * An optional, string summary, intended to apply
     * to all operations in this path.
     */
    protected ?string $summary;
    /**
     * An optional, string description, intended to apply to all
     * operations in this path. CommonMark syntax MAY be used
     * for rich text representation.
     */
    protected ?string $description;
    /**
     * A definition of a GET operation on this path.
     */
    protected ?Operation $get;
    /**
     * A definition of a PUT operation on this path.
     */
    protected ?Operation $put;
    /**
     * A definition of a POST operation on this path.
     */
    protected ?Operation $post;
    /**
     * A definition of a DELETE operation on this path.
     */
    protected ?Operation $delete;
    /**
     * A definition of a OPTIONS operation on this path.
     */
    protected ?Operation $options;
    /**
     * A definition of a HEAD operation on this path.
     */
    protected ?Operation $head;
    /**
     * A definition of a PATCH operation on this path.
     */
    protected ?Operation $patch;
    /**
     * A definition of a TRACE operation on this path.
     */
    protected ?Operation $trace;
    /**
     * An alternative server array to service all operations in this path.
     *
     * @var Server[]
     */
    protected array $servers;
    /**
     * A list of parameters that are applicable for all the operations described
     * under this path. These parameters can be overridden at the operation level,
     * but cannot be removed there. The list MUST NOT include duplicated parameters.
     * A unique parameter is defined by a combination of a name and location.
     * The list can use the Reference Object to link to parameters that are defined
     * at the OpenAPI Object's components/parameters.
     *
     * @var Parameter[]|Reference[]
     */
    protected array $parameters;

    /**
     * PathItem constructor.
     * @param  string|null  $ref
     * @param  string|null  $summary
     * @param  string|null  $description
     * @param  Operation|null  $get
     * @param  Operation|null  $put
     * @param  Operation|null  $post
     * @param  Operation|null  $delete
     * @param  Operation|null  $options
     * @param  Operation|null  $head
     * @param  Operation|null  $patch
     * @param  Operation|null  $trace
     * @param  Server[]  $servers
     * @param  Parameter[]|Reference[]  $parameters
     */
    public function __construct(
        ?string $ref,
        ?string $summary,
        ?string $description,
        ?Operation $get,
        ?Operation $put,
        ?Operation $post,
        ?Operation $delete,
        ?Operation $options,
        ?Operation $head,
        ?Operation $patch,
        ?Operation $trace,
        array $servers,
        $parameters
    ) {
        $this->ref = $ref;
        $this->summary = $summary;
        $this->description = $description;
        $this->get = $get;
        $this->put = $put;
        $this->post = $post;
        $this->delete = $delete;
        $this->options = $options;
        $this->head = $head;
        $this->patch = $patch;
        $this->trace = $trace;
        $this->servers = $servers;
        $this->parameters = $parameters;
    }

    public static function fromArray(array $data): self
    {
        $servers = $data['servers'] ?? [];
        $parameters = $data['parameters'] ?? [];

        foreach ($servers as &$server) {
            $server = Server::fromArray($server);
        }

        foreach ($parameters as &$parameter) {
            $parameter = Parameter::fromArray($parameter);
        }

        return new self(
            $data['ref'] ?? null,
            $data['summary'] ?? null,
            $data['description'] ?? null,
            isset($data['get']) ? Operation::fromArray($data['get']) : null,
            isset($data['put']) ? Operation::fromArray($data['put']) : null,
            isset($data['post']) ? Operation::fromArray($data['post']) : null,
            isset($data['delete']) ? Operation::fromArray($data['delete']) : null,
            isset($data['options']) ? Operation::fromArray($data['options']) : null,
            isset($data['head']) ? Operation::fromArray($data['head']) : null,
            isset($data['patch']) ? Operation::fromArray($data['patch']) : null,
            isset($data['trace']) ? Operation::fromArray($data['trace']) : null,
            $servers,
            $parameters
        );
    }
}
