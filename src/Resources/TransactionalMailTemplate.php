<?php

namespace Spatie\MailcoachSdk\Resources;

class TransactionalMailTemplate extends ApiResource
{
    public string $uuid;

    public string $name;

    public string $to;

    public string $cc;

    public string $bcc;

    public string $subject;

    public string $html;

    public bool $storeMail;

    public string $createdAt;
}
