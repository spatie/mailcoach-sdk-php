<?php

namespace Spatie\MailcoachSdk\Resources;
use Spatie\MailcoachSdk\Resources\Subscriber;

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

    public string $campaignMailer;

    public string $automationMailer;

    public string $transactionalMailer;

    public ?string $reportRecipients;

    public bool $reportCampaignSent;

    public bool $reportCampaignSummary;

    public bool $reportEmailListSummary;

    public ?string $emailListSummarySentAt;

    public string $createdAt;

    public string $updatedAt;

    public function delete()
    {
        $this->mailcoach->deleteEmailList($this->uuid);
    }

    /**
     * @param array<string, string> $filters
     *
     * @return array<int, Subscriber>
     */
    public function subscribers(array $filters = []): array
    {
        return $this->subscribers($filters);
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
}
