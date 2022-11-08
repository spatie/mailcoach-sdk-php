<?php

namespace Spatie\MailcoachSdk\Resources;

class Campaign extends ApiResource
{
    public string $uuid;

    public string $name;

    public string $emailListUuid;

    public ?string $fromEmail;

    public ?string $fromName;

    public string $status;

    public ?string $html;

    public ?string $mailableClass;

    public bool $utmTags;

    public int $sentToNumberOfSubscribers;

    public ?string $segmentClass;

    public string $segmentDescription;

    public int $openCount;

    public int $uniqueOpenCount;

    public int $openRate;

    public int $clickCount;

    public int $uniqueClickCount;

    public int $clickRate;

    public int $unsubscribeCount;

    public int $unsubscribeRate;

    public int $bounceCount;

    public int $bounceRate;

    public ?string $sentAt;

    public ?string $statisticsCalculatedAt;

    public ?string $scheduledAt;

    public ?string $lastModifiedAt;

    public ?string $summaryMailSentAt;

    public ?string $createdAt;

    public ?string $updatedAt;

    public ?string $structuredHtml;

    public ?string $emailHtml;

    public ?string $webviewHtml;

    public ?string $templateUuid;

    public function save(): self
    {
        $campaign = $this->mailcoach->updateCampaign($this->uuid, $this->toArray());

        $this->attributes = $campaign->toArray();

        $this->fill();

        return $this;
    }

    public function delete(): self
    {
        $this->mailcoach->deleteCampaign($this->uuid);

        return $this;
    }

    public function sendTest(string|array $email): self
    {
        $this->mailcoach->sendTest($this->uuid, $email);

        return $this;
    }

    public function send(): self
    {
        $this->mailcoach->send($this->uuid);

        return $this;
    }
}
