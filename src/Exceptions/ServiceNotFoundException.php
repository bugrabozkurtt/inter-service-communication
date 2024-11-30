<?php

namespace BugraBozkurt\InterServiceCommunication\Exceptions;

use Exception;

class ServiceNotFoundException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
