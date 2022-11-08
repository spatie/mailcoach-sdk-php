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
}
