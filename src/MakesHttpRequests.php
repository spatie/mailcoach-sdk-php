<?php

namespace Spatie\MailcoachSdk;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Spatie\MailcoachSdk\Exceptions\ActionFailed;
use Spatie\MailcoachSdk\Exceptions\InvalidData;
use Spatie\MailcoachSdk\Exceptions\ResourceNotFound;
use Spatie\MailcoachSdk\Exceptions\Unauthorized;

trait MakesHttpRequests
{
    public function get(string $uri)
    {
        return $this->request('GET', $uri);
    }

    public function post(string $uri, array $payload = [])
    {
        return $this->request('POST', $uri, $payload);
    }

    public function put(string $uri, array $payload = [])
    {
        return $this->request('PUT', $uri, $payload);
    }

    public function patch(string $uri, array $payload = [])
    {
        return $this->request('PATCH', $uri, $payload);
    }

    public function delete(string $uri, array $payload = [])
    {
        return $this->request('DELETE', $uri, $payload);
    }

    public function request(string $verb, string $uri, array $payload = []): mixed
    {
        $response = $this->client->request(
            $verb,
            $uri,
            empty($payload) ? [] : ['form_params' => $payload]
        );

        if (! $this->isSuccessful($response)) {
            $this->handleRequestError($response);

            return null;
        }

        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    public function isSuccessful($response): bool
    {
        if (! $response) {
            return false;
        }

        return (int) substr($response->getStatusCode(), 0, 1) === 2;
    }

    protected function buildFilterString(array $filters): string
    {
        if (count($filters) === 0) {
            return '';
        }

        $preparedFilters = [];
        foreach ($filters as $name => $value) {
            $preparedFilters["filter[{$name}]"] = $value;
        }

        return '?'.http_build_query($preparedFilters);
    }

    protected function handleRequestError(ResponseInterface $response): void
    {
        if ($response->getStatusCode() === 422) {
            throw new InvalidData(json_decode((string) $response->getBody(), true));
        }

        if ($response->getStatusCode() === 404) {
            throw new ResourceNotFound();
        }

        if ($response->getStatusCode() === 400) {
            throw new ActionFailed((string) $response->getBody());
        }

        if ($response->getStatusCode() === 401) {
            throw new Unauthorized((string) $response->getBody());
        }

        throw new Exception((string) $response->getBody());
    }
}
