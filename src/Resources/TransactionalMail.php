<?php

namespace Spatie\MailcoachSdk\Resources;

class TransactionalMail extends ApiResource
{
    public string $uuid;

    public string $subject;

    public string $from;

    public string|array $to;

    public string|array $cc;

    public string|array $bcc;

    public string $body;

    public string $html;

    public string $createdAt;
}
