<?php

namespace BugraBozkurt\InterServiceCommunication\Facades;

use Illuminate\Support\Facades\Facade;

class User extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'user.client';
    }
}
