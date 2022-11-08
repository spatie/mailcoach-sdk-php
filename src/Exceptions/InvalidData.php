<?php

namespace Spatie\MailcoachSdk\Exceptions;

use Exception;

class InvalidData extends Exception
{
    public array $errors = [];

    public function __construct(array $errors)
    {
        $this->errors = $errors;

        parent::__construct('The given data failed to pass validation. '.print_r($this->errors, true));
    }
}
