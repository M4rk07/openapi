<?php

namespace Restz\OpenAPI\Models;

class Server implements Model
{
    /**
     * REQUIRED. A URL to the target host. This URL supports Server Variables
     * and MAY be relative, to indicate that the host location is relative to the
     * location where the OpenAPI document is being served. Variable substitutions
     * will be made when a variable is named in {brackets}.
     */
    protected string $url;
    /**
     * An optional string describing the host designated by the URL.
     * CommonMark syntax MAY be used for rich text representation.
     */
    protected ?string $description;
    /**
     * A map between a variable name and its value.
     * The value is used for substitution in the server's URL template.
     *
     * @var ServerVariable[]
     */
    protected array $variables;

    /**
     * Server constructor.
     * @param  string  $url
     * @param  string|null  $description
     * @param  ServerVariable[]  $variables
     */
    public function __construct(string $url, ?string $description, array $variables)
    {
        $this->url = $url;
        $this->description = $description;
        $this->variables = $variables;
    }

    public static function fromArray(array $data): self
    {
        $variables = $data['variables'] ?? [];

        foreach ($variables as &$server_variable) {
            $server_variable = ServerVariable::fromArray($data['variables']);
        }

        return new self(
            $data['url'],
            $data['description'] ?? null,
            $variables
        );
    }
}
