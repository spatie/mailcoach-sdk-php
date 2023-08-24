<?php

namespace Spatie\MailcoachSdk\Resources;

class CampaignClick extends ApiResource
{
    public string $uuid;
    public string $url;
    public int $uniqueClickCount;
    public int $clickCount;
}
