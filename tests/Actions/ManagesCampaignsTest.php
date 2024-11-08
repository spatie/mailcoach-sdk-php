<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\RequestInterface;
use Spatie\MailcoachSdk\Mailcoach;
use Tomb1n0\GuzzleMockHandler\GuzzleMockHandler;
use Tomb1n0\GuzzleMockHandler\GuzzleMockResponse;

it('handles multiple test emails', function () {
    $handler = new GuzzleMockHandler;
    $response = (new GuzzleMockResponse('campaigns/123/send-test'))
        ->withMethod('post')
        ->withAssertion(fn (RequestInterface $request) => $this->assertEquals(
            'email=foo%40bar.com%2Cbar%40foo.com',
            (string) $request->getBody()
        ));

    $handler->expect($response);

    $mailcoach = new Mailcoach('', '', new Client(['handler' => HandlerStack::create($handler)]));
    $mailcoach->sendTest('123', ['foo@bar.com', 'bar@foo.com']);
});
