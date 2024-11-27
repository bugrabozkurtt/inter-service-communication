<?php

namespace BugraBozkurt\InterServiceCommunication\Helpers;

use BugraBozkurt\InterServiceCommunication\Exceptions\UnauthorizedException;
use BugraBozkurt\InterServiceCommunication\Validators\TokenValidator;

class AuthHelper
{
    public static function customerId(): int
    {
        $token = request()->header('Authorization');

        if (!$token || !str_starts_with($token, 'Bearer ')) {
            throw new UnauthorizedException('Authorization header is missing.');
        }

        $token = str_replace('Bearer ', '', $token);

        return TokenValidator::getCustomerId($token);
    }

    public static function validateRequest(): array
    {
        $token = request()->header('Authorization');

        if (!$token || !str_starts_with($token, 'Bearer ')) {
            throw new UnauthorizedException('Authorization header is missing.');
        }

        $token = str_replace('Bearer ', '', $token);

        return TokenValidator::validateToken($token);
    }
}
