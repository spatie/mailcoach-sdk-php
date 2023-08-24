<?php

namespace Spatie\MailcoachSdk\Resources;

class CampaignOpen extends ApiResource
{
    public ?string $uuid;

    public string $subscriberEmailListUuid;

    public string $subscriberUuid;

    public string $subscriberEmail;

    public int $openCount;

    public string $firstOpenedAt;
}
