<?php

namespace BugraBozkurt\InterServiceCommunication\Validators;

use BugraBozkurt\InterServiceCommunication\Exceptions\UnauthorizedException;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokenValidator
{
    /**
     * @throws UnauthorizedException
     */
    public static function validateToken(string $token): array
    {
        try {
            $payload = JWTAuth::setToken($token)->getPayload();

            return $payload->toArray();
        } catch (\Exception $e) {
            throw new UnauthorizedException('Token is invalid or expired.');
        }
    }

    public static function getCustomerId(string $token): int
    {
        $payload = self::validateToken($token);

        if (!isset($payload['sub'])) {
            throw new UnauthorizedException('Customer ID not found in token.');
        }

        return (int)$payload['sub'];
    }
}

