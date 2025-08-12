<?php

namespace Spatie\MailcoachSdk\Actions;

trait ManagesAutomations
{
    public function triggerAutomation(string $automationUuid, array $subscriberUuids): void
    {
        $this->post("automations/{$automationUuid}/trigger", [
            'subscribers' => $subscriberUuids,
        ]);
    }
}
