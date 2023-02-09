<?php

namespace Spatie\MailcoachSdk\Actions;

use Spatie\MailcoachSdk\Resources\Subscriber;
use Spatie\MailcoachSdk\Support\PaginatedResults;

trait ManagesSubscribers
{
    /**
     * @param  string  $emailListUuid
     * @param  array<string, string>  $filters
     * @return PaginatedResults<Subscriber>
     */
    public function subscribers(string $emailListUuid, array $filters = []): PaginatedResults
    {
        return PaginatedResults::make(
            "email-lists/{$emailListUuid}/subscribers{$this->buildFilterString($filters)}",
            Subscriber::class,
            $this,
        );
    }

    public function subscriber(string $uuid): Subscriber
    {
        $attributes = $this->get("subscribers/{$uuid}")['data'];

        return new Subscriber($attributes, $this);
    }

    public function createSubscriber(string $emailListUuid, array $attributes): Subscriber
    {
        $attributes = $this->post("email-lists/{$emailListUuid}/subscribers", $attributes)['data'];

        return new Subscriber($attributes, $this);
    }

    public function findByEmail(string $emailListUuid, string $email): ?Subscriber
    {
        $subscribers = $this->get("email-lists/{$emailListUuid}/subscribers?filter[email]={$email}")['data'];

        if (count($subscribers) === 0) {
            return null;
        }

        return new Subscriber($subscribers[0], $this);
    }

    public function updateSubscriber(string $subscriberUuid, array $attributes): Subscriber
    {
        $attributes = $this->patch("subscribers/{$subscriberUuid}", $attributes)['data'];

        return new Subscriber($attributes, $this);
    }

    public function deleteSubscriber(string $subscriberUuid): void
    {
        $this->delete("subscribers/{$subscriberUuid}");
    }

    public function confirmSubscriber(string $subscriberUuid): void
    {
        $this->post("subscribers/{$subscriberUuid}/confirm");
    }

    public function unsubscribeSubscriber(string $subscriberUuid): void
    {
        $this->post("subscribers/{$subscriberUuid}/unsubscribe");
    }

    public function resubscribeSubscriber(string $subscriberUuid): void
    {
        $this->post("subscribers/{$subscriberUuid}/resubscribe");
    }

    public function resendConfirmation(string $subscriberUuid): void
    {
        $this->post("subscribers/{$subscriberUuid}/resend-confirmation");
    }
}
