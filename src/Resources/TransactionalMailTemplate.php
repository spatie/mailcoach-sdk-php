<?php

namespace Spatie\MailcoachSdk\Resources;

class TransactionalMailTemplate extends ApiResource
{
    public string $uuid;

    public string $name;

    public string|array $to;

    public string|array $cc;

    public string|array $bcc;

    public string $subject;

    public string $html;

    public bool $storeMail;

    public string $createdAt;
}
