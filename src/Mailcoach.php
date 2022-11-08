<?php

namespace Spatie\MailcoachSdk;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Spatie\MailcoachSdk\Concerns\MakesHttpRequests;
use Spatie\MailcoachSdk\Concerns\ManagesEmailLists;
use Spatie\MailcoachSdk\Concerns\ManagesSubscribers;

class Mailcoach
{
    use MakesHttpRequests;
    use ManagesEmailLists;
    use ManagesSubscribers;

    protected ClientInterface $client;

    public function __construct(
        public string $apiToken,
        public string $baseUri,
    ) {
        $this->client = new Client([
            'http_errors' => false,
            'base_uri' => $this->baseUri.'/',
            'headers' => [
                'Authorization' => "Bearer {$this->apiToken}",
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }
}
