<?php

namespace BugraBozkurt\InterServiceCommunication\Helpers;

use Illuminate\Support\Facades\Cache;

class TokenValidator
{
    public static function validate(string $token): ?array
    {
        $payload = self::decodeToken($token);

        if (!$payload || !isset($payload['sub'])) {
            return null;
        }

        $userId = $payload['sub'];

        $cachedToken = Cache::get("jwt:{$userId}");
        if (!$cachedToken || $cachedToken !== $token) {
            return null;
        }

        return $payload;
    }

    private static function decodeToken(string $token): ?array
    {
        $parts = explode('.', $token);

        if (count($parts) !== 3) {
            return null;
        }

        $payload = json_decode(base64_decode($parts[1]), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }

        return $payload;
    }
}
