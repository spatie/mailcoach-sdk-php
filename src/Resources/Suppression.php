<?php

namespace Spatie\MailcoachSdk\Resources;

class Suppression extends ApiResource
{
    public string $uuid;

    public string $email;

    public string $reason;

    public ?string $createdAt;

    public ?string $updatedAt;
}
