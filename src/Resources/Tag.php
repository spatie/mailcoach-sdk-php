<?php

namespace Spatie\MailcoachSdk\Resources;

class Tag extends ApiResource
{
    public string $uuid;

    public string $name;

    public string $emailListUuid;

    public ?string $createdAt;

    public ?string $updatedAt;
}
