<?php

namespace BugraBozkurt\InterServiceCommunication\Enums;

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


    public function port(): ?string
    {
        return PortEnum::tryFrom($this->value)->value;
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
