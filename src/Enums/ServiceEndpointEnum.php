<?php

namespace BugraBozkurt\InterServiceCommunication\Enums;

enum ServiceEndpointEnum: string
{
    case USER = 'user';
    case AUTH = 'auth';
    case PRODUCT = 'product';
    case STOCK = 'stock';
    case CART = 'cart';
    case ORDER = 'order';
    case CAMPAIGN = 'campaign';

    public function port(): ?int
    {
        return match ($this) {
            self::USER => PortEnum::USER->value,
            self::AUTH => PortEnum::AUTH->value,
            self::PRODUCT => PortEnum::PRODUCT->value,
            self::STOCK => PortEnum::STOCK->value,
            self::CART => PortEnum::CART->value,
            self::ORDER => PortEnum::ORDER->value,
            self::CAMPAIGN => PortEnum::CAMPAIGN->value
        };
    }

    public static function toArray(): array
    {
        return [
            self::USER,
            self::AUTH,
            self::PRODUCT,
            self::STOCK,
            self::CART,
            self::ORDER,
            self::CAMPAIGN
        ];
    }
}
