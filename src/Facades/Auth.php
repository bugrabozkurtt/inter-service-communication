<?php

namespace BugraBozkurt\InterServiceCommunication\Facades;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Response get(string $endpoint, array $query = [])
 * @method static Response post(string $endpoint, array $body = [])
 * @method static self withHeader(string $key, string $value)
 *
 * @see \BugraBozkurt\InterServiceCommunication\Clients\HttpClient
 */
class Auth extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'auth.client';
    }
}
