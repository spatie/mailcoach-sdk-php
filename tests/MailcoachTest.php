<?php

/*
 * Uncomment if you want to test against the real API
 *
beforeEach(function () {
    $this->mailcoach = new Mailcoach(
        $_ENV['MAILCOACH_TOKEN'],
        $_ENV['MAILCOACH_ENDPOINT'],
    );
});
*/

use Spatie\MailcoachSdk\Mailcoach;

it('can new up mailcoach', function () {
    $mailcoach = new Mailcoach('fake-token', 'fake-uri');

    expect($mailcoach)->toBeInstanceOf(Mailcoach::class);

    expect($mailcoach->apiToken())->toBe('fake-token');
    expect($mailcoach->endpoint())->toBe('fake-uri');
});
