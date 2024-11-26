<?php

namespace BugraBozkurt\InterServiceCommunication\Enums;

use Illuminate\Support\Str;

enum ServiceEndpointEnum: string
{
    case USER = 'user';
    case AUTH = 'auth';
    case PRODUCT = 'product';
    case CAMPAIGN = 'campaign';
    case CART = 'cart';
    case ORDER = 'order';
    case PAYMENT = 'payment';

    public function baseUri(): string
    {
        return env(Str::upper($this->value) . '_BASE_URI', "http://{$this->value}");
    }

    public function port(): ?string
    {
        return env(Str::upper($this->value) . '_PORT', null);
    }

    public function fullUri(): string
    {
        $baseUri = $this->baseUri();
        $port = $this->port();

        return $port ? "{$baseUri}:{$port}" : $baseUri;
    }

    public static function all(): array
    {
        return [
            self::USER,
            self::AUTH,
            self::PRODUCT,
            self::CAMPAIGN,
            self::CART,
            self::ORDER,
            self::PAYMENT,
        ];
    }
}
