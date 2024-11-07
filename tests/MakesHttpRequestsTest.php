<?php

use Spatie\MailcoachSdk\Mailcoach;

it('does not double encode', function () {
    $mailcoach = new Mailcoach('fake-token', 'fake-uri');

    expect(invade($mailcoach)->buildFilterString([
        'email' => 'info@spatie.be',
    ]))->toBe('?filter%5Bemail%5D=info%40spatie.be');
});
