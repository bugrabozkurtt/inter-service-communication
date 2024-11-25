<?php

namespace BugraBozkurt\InterServiceCommunication\Exceptions;

use Exception;

class ServiceNotFoundException extends Exception
{
    public function __construct(string $service)
    {
        parent::__construct("Service [$service] not found in the configuration.");
    }
}
