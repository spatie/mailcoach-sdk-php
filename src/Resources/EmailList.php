<?php

namespace Spatie\MailcoachSdk\Resources;

use Spatie\MailcoachSdk\Support\PaginatedResults;

class EmailList extends ApiResource
{
    public string $uuid;

    public string $name;

    public int $activeSubscribersCount;

    public bool $campaignsFeedEnabled;

    public string $defaultFromEmail;

    public string $defaultFromName;

    public ?string $defaultReplyToMail;

    public bool $allowFormSubscriptions;

    public ?string $honeypotField;

    public ?string $redirectAfterSubscribed;

    public ?string $redirectAfterAlreadySubscribed;

    public ?string $redirectAfterSubscriptionPending;

    public ?string $redirectAfterUnsubscribed;

    public bool $requiresConfirmation;

    public ?string $confirmationMailSubject;

    public ?string $confirmationMailContent;

    public ?string $confirmationMailableClass;

    public ?string $campaignMailer;

    public ?string $automationMailer;

    public ?string $transactionalMailer;

    public ?string $reportRecipients;

    public bool $reportCampaignSent;

    public bool $reportCampaignSummary;

    public bool $reportEmailListSummary;

    public ?string $emailListSummarySentAt;

    public string $createdAt;

    public string $updatedAt;

    /**
     * @param  array<string, string>  $filters
     * @return \Spatie\MailcoachSdk\Support\PaginatedResults
     */
    public function subscribers(array $filters = []): PaginatedResults
    {
        return $this->mailcoach->subscribers($this->uuid, $filters);
    }

    public function subscriber(string $email): ?Subscriber
    {
        return $this->mailcoach->findByEmail($this->uuid, $email);
    }

    public function save(): self
    {
        $emailList = $this->mailcoach->updateEmailList($this->uuid, $this->toArray());

        $this->attributes = $emailList->toArray();

        $this->fill();

        return $this;
    }

    public function delete(): self
    {
        $this->mailcoach->deleteEmailList($this->uuid);

        return $this;
    }
}
