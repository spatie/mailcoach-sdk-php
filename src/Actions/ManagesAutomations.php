<?php

namespace Spatie\MailcoachSdk\Actions;

use Spatie\MailcoachSdk\MakesHttpRequests;
use Spatie\MailcoachSdk\Resources\AutomationMail;
use Spatie\MailcoachSdk\Support\PaginatedResults;

trait ManagesAutomations
{
    use MakesHttpRequests;

    public function triggerAutomation(string $automationUuid, array $subscriberUuids): void
    {
        $this->post("automations/{$automationUuid}/trigger", [
            'subscribers' => $subscriberUuids,
        ]);
    }

    public function automationMails(array $filters = []): PaginatedResults
    {
        return PaginatedResults::make(
            "automation-mails{$this->buildFilterString($filters)}",
            AutomationMail::class,
            $this,
        );
    }

    public function automationMail(string $uuid): AutomationMail
    {
        $attributes = $this->get("automation-mails/{$uuid}")['data'];

        return new AutomationMail($attributes, $this);
    }

    public function createAutomationMail(array $data): AutomationMail
    {
        $attributes = $this->post('automation-mails', $data)['data'];

        return new AutomationMail($attributes, $this);
    }

    public function updateAutomationMail(string $uuid, array $data): AutomationMail
    {
        $attributes = $this->put("automation-mails/{$uuid}", $data)['data'];

        return new AutomationMail($attributes, $this);
    }

    public function deleteAutomationMail(string $automationMailUuid): void
    {
        $this->delete("automation-mails/{$automationMailUuid}");
    }
}
