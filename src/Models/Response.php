<?php

namespace Restz\OpenAPI\Models;

class Response implements Model
{
    /**
     * REQUIRED. A short description of the response.
     * CommonMark syntax MAY be used for rich text representation.
     */
    protected string $description;
    /**
     * Maps a header name to its definition. RFC7230 states header names
     * are case insensitive. If a response header is defined with the
     * name "Content-Type", it SHALL be ignored.
     *
     * @var Header[]|Reference[]
     */
    protected array $headers;
    /**
     * A map containing descriptions of potential response payloads.
     * The key is a media type or media type range and the value describes it.
     * For responses that match multiple keys, only the most specific
     * key is applicable. e.g. text/plain overrides text/*
     *
     * @var MediaType[]
     */
    protected array $content;
    /**
     * A map of operations links that can be followed from the response.
     * The key of the map is a short name for the link, following
     * the naming constraints of the names for Component Objects.
     *
     * @var Link[]|Reference[]
     */
    protected array $links;

    /**
     * Response constructor.
     * @param  string  $description
     * @param  Header[]|Reference[]  $headers
     * @param  MediaType[]  $content
     * @param  Link[]|Reference[]  $links
     */
    public function __construct(string $description, $headers, array $content, $links)
    {
        $this->description = $description;
        $this->headers = $headers;
        $this->content = $content;
        $this->links = $links;
    }

    public static function fromArray(array $data): self
    {
        $headers = $data['headers'] ?? [];
        $content = $data['content'] ?? [];
        $links = $data['links'] ?? [];

        foreach ($headers as &$header) {
            $header = Header::fromArray($header);
        }

        foreach ($content as &$media_type) {
            $media_type = MediaType::fromArray($media_type);
        }

        foreach ($links as &$link) {
            $link = Link::fromArray($link);
        }

        return new self(
            $data['description'],
            $headers,
            $content,
            $links
        );
    }
}
