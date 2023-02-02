<?php

namespace Spatie\MailcoachSdk\Resources;

class Subscriber extends ApiResource
{
    public string $uuid;

    public string $emailListUuid;

    public string $email;

    public ?string $firstName;

    public ?string $lastName;

    public array $extraAttributes = [];

    public array $tags = [];

    public ?string $subscribedAt;

    public ?string $createdAt;

    public ?string $updatedAt;

    public ?string $unsubscribedAt;

    public function save(): self
    {
        $subscriber = $this->mailcoach->updateSubscriber($this->uuid, $this->toArray());

        $this->attributes = $subscriber->toArray();

        $this->fill();

        return $this;
    }

    public function delete(): void
    {
        $this->mailcoach->deleteSubscriber($this->uuid);
    }

    public function confirm(): self
    {
        $this->mailcoach->confirmSubscriber($this->uuid);

        return $this;
    }

    public function unsubscribe(): self
    {
        $this->mailcoach->unsubscribeSubscriber($this->uuid);

        return $this;
    }
}
