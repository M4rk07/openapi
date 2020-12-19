<?php


namespace Restz\OpenAPI\Models;


class PathItem
{
    /**
     * Allows for an external definition of this path item.
     * The referenced structure MUST be in the format of a Path Item Object.
     * In case a Path Item Object field appears both in the defined object and
     * the referenced object, the behavior is undefined.
     */
    protected string $ref;
    /**
     * An optional, string summary, intended to apply
     * to all operations in this path.
     */
    protected string $summary;
    /**
     * An optional, string description, intended to apply to all
     * operations in this path. CommonMark syntax MAY be used
     * for rich text representation.
     */
    protected string $description;
    /**
     * A definition of a GET operation on this path.
     */
    protected Operation $get;
    /**
     * A definition of a PUT operation on this path.
     */
    protected Operation $put;
    /**
     * A definition of a POST operation on this path.
     */
    protected Operation $post;
    /**
     * A definition of a DELETE operation on this path.
     */
    protected Operation $delete;
    /**
     * A definition of a OPTIONS operation on this path.
     */
    protected Operation $options;
    /**
     * 	A definition of a HEAD operation on this path.
     */
    protected Operation $head;
    /**
     * A definition of a PATCH operation on this path.
     */
    protected Operation $patch;
    /**
     * A definition of a TRACE operation on this path.
     */
    protected Operation $trace;
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
}
