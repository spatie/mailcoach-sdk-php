<?php

namespace Spatie\MailcoachSdk\Support;

use ArrayAccess;
use ArrayIterator;
use IteratorAggregate;
use Spatie\MailcoachSdk\Mailcoach;
use Traversable;

class PaginatedResults implements ArrayAccess, IteratorAggregate
{
    public static function make(
        string $endpoint,
        string $mappingClass,
        Mailcoach $mailcoach,
    ): self {
        $response = $mailcoach->get($endpoint);

        $results = array_map(
            fn ($attributes) => new $mappingClass($attributes, $mailcoach),
            $response['data'],
        );

        return new self(
            $results,
            $response['links'],
            $response['meta'],
            $mailcoach,
            $mappingClass,
        );
    }

    public function __construct(
        protected array $results,
        protected array $links,
        protected array $meta,
        protected Mailcoach $mailcoach,
        protected string $mappingClass
    ) {
    }

    public function results(): array
    {
        return $this->results;
    }

    public function previousUrl(): ?string
    {
        return $this->links['previous'];
    }

    public function nextUrl(): ?string
    {
        return $this->links['next'];
    }

    public function previous(): ?self
    {
        if (! $previousUrl = $this->previousUrl()) {
            return null;
        }

        return PaginatedResults::make($previousUrl, $this->mappingClass, $this->mailcoach);
    }

    public function next(): ?self
    {
        if (! $nextUrl = $this->nextUrl()) {
            return null;
        }

        return PaginatedResults::make($nextUrl, $this->mappingClass, $this->mailcoach);
    }

    public function currentPage(): int
    {
        return $this->meta['current_page'];
    }

    public function total(): int
    {
        return $this->meta['total'];
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->results[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->results[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->results[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->results[$offset]);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->results);
    }
}
