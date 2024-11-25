<?php

namespace BugraBozkurt\InterServiceCommunication\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array get(string $endpoint, array $query = [])
 * @method static array post(string $endpoint, array $body = [])
 * @method static self withHeader(string $key, string $value)
 *
 * @see \BugraBozkurt\InterServiceCommunication\Clients\HttpClient
 */
class Order extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'order.client';
    }
}
