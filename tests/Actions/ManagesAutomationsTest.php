<?php

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\RequestInterface;
use Spatie\MailcoachSdk\Mailcoach;
use Spatie\MailcoachSdk\Resources\AutomationMail;
use Tomb1n0\GuzzleMockHandler\GuzzleMockHandler;
use Tomb1n0\GuzzleMockHandler\GuzzleMockResponse;

function mailcoachWithHandler(GuzzleMockHandler $handler): Mailcoach
{
    return new Mailcoach('', '', new Client(['handler' => HandlerStack::create($handler)]));
}

it('can trigger an automation', function () {
    $handler = new GuzzleMockHandler;
    $response = (new GuzzleMockResponse('automations/123/trigger'))
        ->withMethod('post')
        ->withAssertion(fn (RequestInterface $request) => $this->assertEquals(
            'subscribers[0]=abc&subscribers[1]=def',
            urldecode($request->getBody()->getContents())
        ));

    $handler->expect($response);

    $mailcoach = mailcoachWithHandler($handler);
    $mailcoach->triggerAutomation('123', ['abc', 'def']);
});

it('can list automation mails', function () {
    $handler = new GuzzleMockHandler;
    $response = (new GuzzleMockResponse('automation-mails'))
        ->withMethod('get')
        ->withBody([
            'data' => [
                ['uuid' => 'abc', 'name' => 'Welcome email'],
                ['uuid' => 'def', 'name' => 'Follow up'],
            ],
            'links' => ['first' => null, 'last' => null, 'prev' => null, 'next' => null],
            'meta' => ['current_page' => 1, 'total' => 2],
        ]);

    $handler->expect($response);

    $automationMails = mailcoachWithHandler($handler)->automationMails()->results();

    expect($automationMails)->toHaveCount(2);
    expect($automationMails[0])->toBeInstanceOf(AutomationMail::class);
    expect($automationMails[0]->name)->toBe('Welcome email');
});

it('can get a single automation mail', function () {
    $handler = new GuzzleMockHandler;
    $response = (new GuzzleMockResponse('automation-mails/123'))
        ->withMethod('get')
        ->withBody([
            'data' => ['uuid' => '123', 'name' => 'Welcome email', 'subject' => 'Welcome aboard'],
        ]);

    $handler->expect($response);

    $automationMail = mailcoachWithHandler($handler)->automationMail('123');

    expect($automationMail)->toBeInstanceOf(AutomationMail::class);
    expect($automationMail->uuid)->toBe('123');
    expect($automationMail->subject)->toBe('Welcome aboard');
});

it('can create an automation mail', function () {
    $handler = new GuzzleMockHandler;
    $response = (new GuzzleMockResponse('automation-mails'))
        ->withMethod('post')
        ->withBody([
            'data' => ['uuid' => '123', 'name' => 'Welcome email', 'subject' => 'Welcome aboard'],
        ])
        ->withAssertion(function (RequestInterface $request) {
            parse_str($request->getBody()->getContents(), $body);

            $this->assertEquals(['name' => 'Welcome email', 'subject' => 'Welcome aboard'], $body);
        });

    $handler->expect($response);

    $automationMail = mailcoachWithHandler($handler)->createAutomationMail([
        'name' => 'Welcome email',
        'subject' => 'Welcome aboard',
    ]);

    expect($automationMail)->toBeInstanceOf(AutomationMail::class);
    expect($automationMail->name)->toBe('Welcome email');
});

it('can update an automation mail', function () {
    $handler = new GuzzleMockHandler;
    $response = (new GuzzleMockResponse('automation-mails/123'))
        ->withMethod('put')
        ->withBody([
            'data' => ['uuid' => '123', 'name' => 'Updated name'],
        ])
        ->withAssertion(function (RequestInterface $request) {
            parse_str($request->getBody()->getContents(), $body);

            $this->assertEquals(['name' => 'Updated name'], $body);
        });

    $handler->expect($response);

    $automationMail = mailcoachWithHandler($handler)->updateAutomationMail('123', ['name' => 'Updated name']);

    expect($automationMail->name)->toBe('Updated name');
});

it('can delete an automation mail', function () {
    $handler = new GuzzleMockHandler;
    $response = (new GuzzleMockResponse('automation-mails/123'))
        ->withMethod('delete')
        ->withStatus(204)
        ->withAssertion(fn (RequestInterface $request) => $this->assertEquals('DELETE', $request->getMethod()));

    $handler->expect($response);

    mailcoachWithHandler($handler)->deleteAutomationMail('123');
});
