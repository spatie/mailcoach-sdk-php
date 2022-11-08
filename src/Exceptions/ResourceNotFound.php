<?php

namespace Spatie\MailcoachSdk\Exceptions;

use Exception;

class ResourceNotFound extends Exception
{
    public function __construct()
    {
        parent::__construct('The resource you are looking for could not be found.');
    }
}
