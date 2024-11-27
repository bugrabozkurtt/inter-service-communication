<?php

namespace BugraBozkurt\InterServiceCommunication\Helpers;

use Illuminate\Support\Facades\Cache;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokenValidator
{
    public static function validate(string $token): ?array
    {
        try {
            $payload = JWTAuth::setToken($token)->getPayload();

            $userId = $payload->get('sub');
            $cachedToken = Cache::get("jwt:{$userId}");

            if (!$cachedToken || $cachedToken !== $token) {
                return null;
            }

            return $payload->toArray();
        } catch (\Exception $e) {
            return null;
        }
    }

}
