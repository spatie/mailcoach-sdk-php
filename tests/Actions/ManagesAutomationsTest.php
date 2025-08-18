<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\RequestInterface;
use Spatie\MailcoachSdk\Mailcoach;
use Tomb1n0\GuzzleMockHandler\GuzzleMockHandler;
use Tomb1n0\GuzzleMockHandler\GuzzleMockResponse;

it('can trigger an automation', function () {
    $handler = new GuzzleMockHandler;
    $response = (new GuzzleMockResponse('automations/123/trigger'))
        ->withMethod('post')
        ->withAssertion(fn (RequestInterface $request) => $this->assertEquals(
            'subscribers[0]=abc&subscribers[1]=def',
            urldecode($request->getBody()->getContents())
        ));

    $handler->expect($response);

    $mailcoach = new Mailcoach('', '', new Client(['handler' => HandlerStack::create($handler)]));
    $mailcoach->triggerAutomation('123', ['abc', 'def']);
});
