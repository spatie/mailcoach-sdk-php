<?php

namespace Spatie\MailcoachSdk\Resources;

class AutomationMail extends ApiResource
{
    public string $uuid;

    public ?string $name;

    public ?string $templateUuid;

    public ?string $fromEmail;

    public ?string $subject;

    public ?string $html;

    public ?string $structuredHtml;

    public ?string $emailHtml;

    public ?string $webviewHtml;

    public array $fields;

    public ?string $mailableClass;

    public bool $utmTags;

    public bool $addSubscriberTags;

    public bool $addSubscriberLinkTags;

    public int $sentToNumberOfSubscribers;

    public int $openCount;

    public int $uniqueOpenCount;

    public float $openRate;

    public int $clickCount;

    public int $uniqueClickCount;

    public float $clickRate;

    public ?string $createdAt;

    public ?string $updatedAt;

    public function save(): self
    {
        $automationMail = $this->mailcoach->updateAutomationMail($this->uuid, $this->toArray());

        $this->attributes = $automationMail->toArray();

        $this->fill();

        return $this;
    }

    public function delete(): self
    {
        $this->mailcoach->deleteAutomationMail($this->uuid);

        return $this;
    }
}
