<?php

namespace Spatie\MailcoachSdk;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Spatie\MailcoachSdk\Actions\ManagesCampaigns;
use Spatie\MailcoachSdk\Actions\ManagesEmailLists;
use Spatie\MailcoachSdk\Actions\ManagesSubscribers;

class Mailcoach
{
    use MakesHttpRequests;
    use ManagesEmailLists;
    use ManagesSubscribers;
    use ManagesCampaigns;

    public function __construct(
        public string $apiToken,
        public string $mailcoachEndpoint,
        public ?ClientInterface $client = null
    ) {
        $this->client ??= new Client([
            'http_errors' => false,
            'base_uri' => $this->mailcoachEndpoint.'/',
            'headers' => [
                'Authorization' => "Bearer {$this->apiToken}",
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function apiToken(): string
    {
        return $this->apiToken;
    }

    public function endpoint(): string
    {
        return $this->mailcoachEndpoint;
    }
}
