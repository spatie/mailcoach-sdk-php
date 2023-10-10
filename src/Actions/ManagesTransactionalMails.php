<?php

namespace Spatie\MailcoachSdk\Actions;

use Spatie\MailcoachSdk\MakesHttpRequests;

trait ManagesTransactionalMails
{
    use MakesHttpRequests;

    public function sendTransactionMail(
        string $name,
        string $from,
        string $to,
        ?array $replacements = null,
        /** @var array{'name': string, 'content': string, 'content_type': string, 'content_id': ?string} $attachments */
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
