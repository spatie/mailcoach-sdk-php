<?php

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Spatie\MailcoachSdk\Exceptions\RateLimited;
use Spatie\MailcoachSdk\Mailcoach;

it('does not double encode', function () {
    $mailcoach = new Mailcoach('fake-token', 'fake-uri');

    expect(invade($mailcoach)->buildFilterString([
        'email' => 'info@spatie.be',
    ]))->toBe('?filter%5Bemail%5D=info%40spatie.be');
});

it('throws a rate limited exception when 429 response code', function () {
    $client = mockClient([
        new Response(429, ['Retry-After' => 45]),
    ]);

    $mailcoach = new Mailcoach('fake-token', 'fake-uri', $client);

    try {
        $mailcoach->get('/');
    } catch (RateLimited $ex) {
        expect($ex->getMessage())->toBe('The request was rate limited. Retry in 45 second(s).');
        expect($ex->retryAfter)->toBe(45);
    }
});

it('handles when Retry-After is not present when 429 response code', function () {
    $client = mockClient([
        new Response(429),
    ]);

    $mailcoach = new Mailcoach('fake-token', 'fake-uri', $client);

    try {
        $mailcoach->get('/');
    } catch (RateLimited $ex) {
        expect($ex->getMessage())->toBe('The request was rate limited. Retry in -1 second(s).');
        expect($ex->retryAfter)->toBe(-1);
    }
});

function mockClient(array $responses): ClientInterface
{
    return new Client([
        'handler' => HandlerStack::create(new MockHandler($responses)),
        'http_errors' => false,
    ]);
}
