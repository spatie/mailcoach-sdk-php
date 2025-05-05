<?php

namespace Spatie\MailcoachSdk\Actions;

use Spatie\MailcoachSdk\MakesHttpRequests;
use Spatie\MailcoachSdk\Resources\TransactionalMail;
use Spatie\MailcoachSdk\Resources\TransactionalMailTemplate;
use Spatie\MailcoachSdk\Support\PaginatedResults;

trait ManagesTransactionalMails
{
    use MakesHttpRequests;

    public function transactionalMails(array $filters = []): PaginatedResults
    {
        return PaginatedResults::make(
            "transactional-mails{$this->buildFilterString($filters)})",
            TransactionalMail::class,
            $this,
        );
    }

    public function transactionalMail(string $uuid): TransactionalMail
    {
        $attributes = $this->get("transactional-mails/{$uuid}")['data'];

        return new TransactionalMail($attributes, $this);
    }

    public function transactionalMailTemplates(array $filters = []): PaginatedResults
    {
        return PaginatedResults::make(
            "transactional-mails/templates{$this->buildFilterString($filters)})",
            TransactionalMailTemplate::class,
            $this,
        );
    }

    public function transactionalMailTemplate(string $uuid): TransactionalMailTemplate
    {
        $attributes = $this->get("transactional-mails/templates/{$uuid}")['data'];

        return new TransactionalMailTemplate($attributes, $this);
    }

    public function sendTransactionMail(
        string $name,
        string $from,
        string $to,
        /** @param  array<string, string>  $replacements */
        ?array $replacements = null,
        /** @param  array{'name': string, 'content': string, 'content_type': string, 'content_id': ?string}  $attachments */
        ?array $attachments = null,
        ?string $subject = null,
        ?string $cc = null,
        ?string $bcc = null,
        ?string $replyTo = null,
        ?bool $fake = null,
        ?bool $store = null
    ): void {
        $this->post('transactional-mails/send', [
            'mail_name' => $name,
            'from' => $from,
            'to' => $to,
            'cc' => $cc,
            'bcc' => $bcc,
            'reply_to' => $replyTo,
            'replacements' => $replacements,
            'attachments' => $attachments,
            'subject' => $subject,
            'fake' => $fake,
            'store' => $store,
        ]);
    }
}
