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

it('can test', function() {
   expect(true)->toBe(true);
});
