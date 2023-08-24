<?php

namespace Spatie\MailcoachSdk\Resources;

class CampaignUnsubscribe extends ApiResource
{
    public string $campaignUuid;

    public string $subscriberUuid;

    public string $subscriberEmail;
}
