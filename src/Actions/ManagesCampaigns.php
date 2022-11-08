<?php

namespace Spatie\MailcoachSdk\Actions;

use Spatie\MailcoachSdk\Resources\Campaign;
use Spatie\MailcoachSdk\Support\PaginatedResults;

trait ManagesCampaigns
{
    public function campaigns(): PaginatedResults
    {
        return PaginatedResults::make(
            'campaigns',
            Campaign::class,
            $this,
        );
    }

    public function campaign(string $uuid): Campaign
    {
        $attributes = $this->get("campaigns/{$uuid}")['data'];

        return new Campaign($attributes, $this);
    }

    public function createCampaign(array $data): Campaign
    {
        $attributes = $this->post('campaigns', $data);

        return new Campaign($attributes, $this);
    }

    public function updateCampaign(string $uuid, array $data): Campaign
    {
        $attributes = $this->put("campaigns/{$uuid}", $data)['data'];

        return new Campaign($attributes, $this);
    }

    public function deleteCampaign(string $campaignUuid): void
    {
        $this->delete("campaigns/{$campaignUuid}");
    }

    public function sendTest(string $campaignUuid, string|array $email): void
    {
        if (is_array($email)) {
            $email = implode($email);
        }

        $this->post("campaigns/{$campaignUuid}/send-test", ['email' => $email]);
    }

    public function send(string $campaignUuid): void
    {
        $this->post("campaigns/{$campaignUuid}/send");
    }
}
