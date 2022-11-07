<?php

namespace Spatie\MailcoachSdk\Resources;

use Spatie\MailcoachSdk\Mailcoach;

class ApiResource
{
    public array $attributes = [];

    protected ?Mailcoach $mailcoach;

    public function __construct(array $attributes, Mailcoach $mailcoach = null)
    {
        $this->attributes = $attributes;

        $this->mailcoach = $mailcoach;

        $this->fill();
    }

    protected function fill(): void
    {
        foreach ($this->attributes as $key => $value) {
            $key = $this->camelCase($key);

            $this->{$key} = $value;
        }
    }

    public function toArray(): array
    {
        $publicProperties = get_object_vars($this);
        unset($publicProperties['attributes']);
        unset($publicProperties['mailcoach']);

        $properties = [];

        foreach ($publicProperties as $key => $value) {
            $properties[$this->snakeCase($key)] = $value;
        }

        return $properties;
    }

    protected function camelCase(string $string): string
    {
        $parts = explode('_', $string);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }

    protected function snakeCase(string $string): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }
}
