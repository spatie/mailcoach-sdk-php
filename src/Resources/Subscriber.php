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

    public function isSubscribed(): bool
    {
        return $this->unsubscribedAt === null;
    }

    public function unsubscribe(): self
    {
        $this->mailcoach->unsubscribeSubscriber($this->uuid);

        return $this;
    }

    public function resubscribe(): self
    {
        $this->mailcoach->resubscribeSubscriber($this->uuid);

        return $this;
    }

    public function removeTags(array $tags): self
    {
        $this->mailcoach->delete("subscribers/{$this->uuid}/tags", ['tags' => $tags]);

        return $this;
    }

    public function addTags(array $tags): self
    {
        $this->mailcoach->post("subscribers/{$this->uuid}/tags", ['tags' => $tags]);

        return $this;
    }
}
