<?php

namespace Spatie\MailcoachSdk\Exceptions;

use Exception;

class RateLimited extends Exception
{
    public function __construct(
        public int $retryAfter
    ) {
        parent::__construct("The request was rate limited. Retry in {$this->retryAfter} second(s).");
    }
}
