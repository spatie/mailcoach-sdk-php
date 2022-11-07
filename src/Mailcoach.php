<?php

namespace Spatie\MailcoachSdk;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Spatie\MailcoachSdk\Concerns\MakesHttpRequests;
use Spatie\MailcoachSdk\Concerns\ManagesEmailLists;
use Spatie\MailcoachSdk\Resources\ApiResource;

class Mailcoach
{
    use MakesHttpRequests;
    use ManagesEmailLists;

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

    /**
     * @param  array<int, mixed>  $collection
     * @param  class-string<ApiResource>  $class
     * @return array<int, ApiResource>
     */
    protected function transformCollection(array $collection, string $class): array
    {
        return array_map(
            fn ($attributes) => new $class($attributes, $this),
            $collection,
        );
    }
}
