<?php

namespace Spatie\MailcoachSdk\Resources;

class CampaignBounce extends ApiResource
{
    public string $subscriberUuid;

    public string $subscriberEmailListUuid;

    public string $subscriberEmail;

    public int $bounceCount;

    public string $type;

    public string $createdAt;
}
