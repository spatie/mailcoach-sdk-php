<?php

use Spatie\MailcoachSdk\Mailcoach;

beforeEach(function() {
   $this->mailcoach = new Mailcoach(
       $_ENV['MAILCOACH_TOKEN'],
       $_ENV['MAILCOACH_ENDPOINT'],
   );
});

it('can test', function () {
    /*
    $this->mailcoach->createEmailList([
        'name' => 'My SDK test',
        'default_from_name' => 'Freek',
        'default_from_email' => 'freek@spatie.be',
    ]);
    */

    $uuid = '63561a40-99da-406f-81c7-202d854a4dba';

    $emailList = $this->mailcoach->emailList($uuid);

    $emailList->name = 'updated name';

    $emailList->save();

    dd($emailList, 'saved');
});
