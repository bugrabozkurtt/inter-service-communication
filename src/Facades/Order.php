<?php

namespace BugraBozkurt\InterServiceCommunication\Facades;

use Illuminate\Support\Facades\Facade;

class Order extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'order.client';
    }
}
