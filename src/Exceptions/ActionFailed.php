<?php

namespace Spatie\MailcoachSdk\Exceptions;

use Exception;

class ActionFailed extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
