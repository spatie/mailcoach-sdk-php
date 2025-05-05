<?php

namespace Spatie\MailcoachSdk\Resources;

class TransactionalMail extends ApiResource
{
    public string $uuid;

    public string $subject;

    public string $from;

    public string $to;

    public string $cc;

    public string $bcc;

    public string $body;

    public string $html;

    public string $createdAt;
}
