<?php

namespace BugraBozkurt\InterServiceCommunication\Enums;

use BugraBozkurt\InterServiceCommunication\Enums\PortEnum;

enum ServiceEndpointEnum: string
{
    case USER = 'user';
    case AUTH = 'auth';
    case PRODUCT = 'product';
    case CAMPAIGN = 'campaign';
    case CART = 'cart';
    case ORDER = 'order';
    case PAYMENT = 'payment';
    case INVOICE = 'invoice';

    public function port(): ?int
    {
        return match ($this) {
            self::USER => PortEnum::USER->value,
            self::AUTH => PortEnum::AUTH->value,
            self::PRODUCT => PortEnum::PRODUCT->value,
            self::CAMPAIGN => PortEnum::CAMPAIGN->value,
            self::CART => PortEnum::CART->value,
            self::ORDER => PortEnum::ORDER->value,
            self::PAYMENT => PortEnum::PAYMENT->value,
            self::INVOICE => PortEnum::INVOICE->value,
        };
    }

    public static function toArray(): array
    {
        return [
            self::USER,
            self::AUTH,
            self::PRODUCT,
            self::CAMPAIGN,
            self::CART,
            self::ORDER,
            self::PAYMENT,
            self::INVOICE,
        ];
    }
}
