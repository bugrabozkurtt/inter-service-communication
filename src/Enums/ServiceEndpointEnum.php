<?php

namespace BugraBozkurt\InterServiceCommunication\Enums;

enum ServiceEndpointEnum: string
{
    case USER = 'user';
    case AUTH = 'auth';
    case ORDER = 'order';
    case CAMPAIGN = 'campaign';

    public function baseUri(): string
    {
        return env(strtoupper($this->value) . '_BASE_URI', 'http://localhost');
    }

    public function port(): ?string
    {
        return env(strtoupper($this->value) . '_PORT', null);
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
            self::ORDER,
            self::CAMPAIGN,
        ];
    }
}
